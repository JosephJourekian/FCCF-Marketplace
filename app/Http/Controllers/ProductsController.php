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
        $attributes['image'] = request('image')->store('pics', 'public');

        DB::table('products')->insert($attributes);
        
        if(request('otherImages') != null){
            foreach ($request->file('otherImages') as $image){
                $product = Products::where('productname', request('productname'))->first();
                $val = [
                    'products_id' => $product->id,
                    'image' => $image->store('pics','public'),
                ];
                DB::table('products_images')->insert($val);
                
            }
        }

        if(request('attribute') != null && request('attributeValue')){
            $product = Products::where('productname', request('productname'))->first();
            $attributes = [
                'products_id' => $product->id,
                'attribute_name' => request('attribute'),
                'attribute_value' => request('attributeValue'),
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
                    $cat = Category::find($product['categories'])->first();
                    if($cat->name == 'Apparel'){
                        DB::table('products')->where('id', $prodObj->id)->update(['stock' => 0]);
                    }
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
            if(isset($product['attribute']) == true){
                foreach($product['attribute'] as $prod){
                    $subAtt = ProductsAttribute::find($prod)->first();
                    $subProd = Products::find($product['id'])->first();
                    DB::table('products')->where('id', $subProd->id)->update(['stock' => $subProd->stock - (int)$subAtt->stock]);
                    if(($subProd->stock - (float)$subAtt->stock) < 0){
                        DB::table('products')->where('id', $subProd->id)->update(['stock' => 0]);
                    }
                    ProductsAttribute::where('id', $prod)->delete();

                }
            }
            if($product['attributeName'] != null && $product['attributeValue'] != null && $product['attributeName2'] != null && $product['attributeValue2'] != null && $product['stock'] !== null){ 
                if($product['stock'] < 0){
                    $product['stock'] = 0;
                }
                $attributes = [
                    'products_id' => $product['id'],
                    'attribute_name' => $product['attributeName'],
                    'attribute_value' => $product['attributeValue'],
                    'attribute_second_name' => $product['attributeName2'],
                    'attribute_second_value' => $product['attributeValue2'],
                    'stock' => $product['stock']
                ];
                $prod = Products::find($product['id'])->first();
                DB::table('products_attribute')->insert($attributes);
                DB::table('products')->where('id', $prod->id)->update(['stock' => $prod->stock + (int)$product['stock']]);
            }

            
        }

        return view('products/attributes',[
            'products' => Products::paginate(50),
            'attributes' => ProductsAttribute::all()
        ]);
    }
    public function editAttributesStock(Products $product){

        return view('products.attributesStock', [
            'product' => Products::find($product)->first(),
            'attributes' => ProductsAttribute::all()
        ]);
    }
    public function attributesStockUpdate(Request $request){
        
        $products = $request->products;
        
        foreach($products as $product){
            $prod = Products::find($product['productId']);
            if($product['stock'] != null){
                $attributeId = $product['id'];
                $attribute = ProductsAttribute::find($attributeId);
                if(($attribute->stock + $product['stock']) < 0){
                    $attribute->update(['stock'=> 0]);

                }
                else{
                    $attribute->update(['stock'=> $attribute->stock + $product['stock']]);
                    $prod->update(['stock' => $prod->stock + $product['stock']]);
                } 
            }
        }

        return view('products/attributes', [
            'products' => Products::paginate(50),
            'categories' => Category::all(),
            'attributes' => ProductsAttribute::all()
        ]);
        
    }
    public function menuTest(){
        return view('menuTest');
    }
    public function test(){
        return view('test');
    }
}
