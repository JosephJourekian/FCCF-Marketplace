<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Products;
use DB;


class ProductsController extends Controller
{
    public function index()
    {

        return view('products.index', [
            'products' => Products::paginate(50)
        ]);
    }

    public function add(){

        return view('products.add');
    }
    public function store(Request $request){
        
        $attributes = request()->validate([
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
    public function show($id){
        $product = Products::find($id);

        return view('products.show', [
            'product' => $product
        ]);

    }
    public function edit($id){

        $product = Products::find($id);

        return view('products.edit', [
            'product' => $product
        ]);

    }
    public function update(Products $product, $id){

        $product = Products::find($id);

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
           

        $product->update($attributes);
    
        return redirect('/products')->with('message', 'Product Updated!');
    }
    public function inventoryView()
    {
        return view('products/inventory.view', [
            'products' => Products::paginate(50)
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
        }

        return view('products/inventory.view',[
            'products' => Products::paginate(50)
        ]);
    }
}
