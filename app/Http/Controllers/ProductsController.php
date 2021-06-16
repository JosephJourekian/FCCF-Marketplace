<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Products;
use App\Models\Category;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use DB;


class ProductsController extends Controller
{
    public function index()
    {

        if (request('category')){
            $products = Category::where('name', request('category'))->firstOrFail()->products;
        }
        else{
            $products = Products::paginate(50);
        }

        return view('products.index', [
            'products' => $products,
            'category' => Category::all(),
            'attributes' => ProductsAttribute::all()
        ]);
    }


    public function add(){

        return view('products.add');
    }
    public function store(Request $request){
        
        $attributes = request()->validate([
            'productname' => ['required', 'string', 'max:255', 'unique:products','alpha_dash'],
            'name' => ['string', 'required', 'max:255'],
            'description' => ['string', 'required', 'max:255'],
            'price' => ['integer', 'required'],
            'stock' => ['integer', 'required'],
            'image' => ['file'],
        ]);
        //dd($attributes);
        $attributes['image'] = request('image')->store('pics', 'public');
        /*foreach($request->file('image') as $image){
            $attributes['image'] = $image->store('pics', 'public');
        }*/
        DB::table('products')->insert($attributes);
    
            //$attributes['image'] = $request->file('image');
            foreach ($request->file('otherImages') as $image){
                $product = Products::where('productname', request('productname'))->first();
                //dd($product);
                $val = [
                    'products_id' => $product->id,
                    'image' => $image->store('pics','public'),
                ];
                //$val['image'] = $image->store('pics', 'public');
                //dd($val);
                DB::table('products_images')->insert($val);
                
            }
            //dd($images);
            //$attributes['image'] = request('image')->store('pics', 'public');    
            //$attributes['image'] = $images;        
            //dd($attributes);
        
        //DB::table('products')->insert($attributes);

        if(request('attribute') != null && request('attributeValue')){ //!= null && request('individualStock') != null ){
            $product = Products::where('productname', request('productname'))->first();
            $attributes = [
                'products_id' => $product->id,
                'attribute_name' => request('attribute'),
                'attribute_value' => request('attributeValue'),
                //'stock' => request('individualStock'),
            ];
            DB::table('products_attribute')->insert($attributes);

        }
        
        

        return redirect()->back()->with('message', 'Product Added!');

    }
    public function delete(Request $request){

        $id = $request->input('id');
        Products::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Product Removed!');
    }
    public function show(Products $product){

        $productI = Products::find($product)->first();
        //unserialize($productI['image']);
        //dd($productI);

        return view('products.show', [
            'product' => $productI,
            'attributes' => ProductsAttribute::all(),
            'images' => ProductsImage::all(),
        ]);

    }
    public function edit(Products $product){

        $productI = Products::find($product)->first();

        return view('products.edit', [
            'product' => $productI
        ]);

    }
    public function update(Products $product){

        $productI = Products::find($product)->first();
        

        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'description' => ['string', 'required', 'max:255'],
            'price' => ['integer', 'required'],
            'stock' => ['integer', 'required'],
            'image' => ['file'],
        ]);       
        if(request('image'))
        {
            $attributes['image'] = request('image')->store('pics', 'public');
        }
           

        $productI->update($attributes);
    
        return redirect('/products')->with('message', 'Product Updated!');
    }
    public function addCategory(){

        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);       
        DB::table('categories')->insert($attributes);
        
        return view('products/inventory.view', [
            'products' => Products::paginate(50),
            'categories' => Category::all()
        ])->with('message', 'Category Added!');
    }
    public function deleteCategory(){
        $id = request('name');
        Category::where('id', $id)->delete();

        return view('products/inventory.view', [
            'products' => Products::paginate(50),
            'categories' => Category::all()
        ])->with('message', 'Category Deleted!');
    }
    public function inventoryView()
    {
        return view('products/inventory.view', [
            'products' => Products::paginate(50),
            'categories' => Category::all(),
            'attributes' => ProductsAttribute::all()
        ]);
    }
    public function inventoryUpdate(Request $request)
    {
        $products = $request->products;
        foreach($products as $product){
            if($product['stock'] != null){
                $prodObj = Products::find($product['id']);
                if(($prodObj->stock + $product['stock']) < 0){
                    $prodObj->update(['stock'=> 0]);
                }
                else{
                    $prodObj->update(['stock'=> $prodObj['stock'] + $product['stock']]);
                }
            }
            if($product['price'] != null){
                $prodObj = Products::find($product['id']);
                if($product['price'] < 0){
                    $prodObj->update(['price'=> 0]);
                }
                else{
                    $prodObj->update(['price'=> $product['price']]);
                }
            }
            if(isset($product['categories']) == true){
                $prodObj = Products::find($product['id']);
                if($prodObj->category()->where('category_id', $product['categories'])->exists() == false){
                    $prodObj->category()->attach($product['categories']); 
                }
            }
            if(isset($product['categoriesR']) == true){
                $prodObj = Products::find($product['id']);
                $prodObj->category()->detach($product['categoriesR']); 
            }
        }

        return view('products/inventory.view',[
            'products' => Products::paginate(50),
            'categories' => Category::all()
        ]);
    }
    public function showAttributes(){
        return view('products/attributes', [
            'products' => Products::paginate(50),
            'categories' => Category::all(),
            'attributes' => ProductsAttribute::all()
        ]);
    }
    public function attributes(Request $request){
        $products = $request->products;

        foreach($products as $product){
            //dd(isset($product['attribute']));
            if(isset($product['attribute']) == true){
                foreach($product['attribute'] as $prod){
                    ProductsAttribute::where('id', $prod)->delete();
                }
            }
            if($product['attributeName'] != null && $product['attributeValue'] != null){ //&& $product['individualStock'] > 0 && $product['individualStock'] != null){
                $attributes = [
                    'products_id' => $product['id'],
                    'attribute_name' => $product['attributeName'],
                    'attribute_value' =>$product['attributeValue'],
                    //'stock' => $product['individualStock'],
                ];
                //dd($attributes);
                DB::table('products_attribute')->insert($attributes);
            }
            /*if($product['individualStock'] != null){

                $prod = ProductsAttribute::where('id', $product['attribute']);
                $prod->update(['stock'=> $prod['stock'] + $product['individualStock']]);

            }*/

            /*if($prodObj->category()->where('category_id', $product['categories'])->exists() == false){
                $prodObj->category()->attach($product['categories']); 
            }
            if($product['attributeName'] != null && $product['attributeValue'] !== null){
                dd(isset($product['attribute']));
            }*/
        }

        return view('products/attributes',[
            'products' => Products::paginate(50),
            'attributes' => ProductsAttribute::all()
        ]);
    }
    public function menuTest(){
        return view('menuTest');
    }
}
