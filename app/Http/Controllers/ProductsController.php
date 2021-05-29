<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Products;
use App\Models\Category;
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
            'products' => $products
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
            'product' => $productI
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
        //dd(request('category'));

        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);       
        //dd($attributes);
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
            'categories' => Category::all()
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
                //dd($product['categories']);
                $prodObj = Products::find($product['id']);
                $prodObj->category()->attach($product['categories']); 
            }
        }

        return view('products/inventory.view',[
            'products' => Products::paginate(50),
            'categories' => Category::all()
        ]);
    }
}
