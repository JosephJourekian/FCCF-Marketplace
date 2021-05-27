<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;

class CartsController extends Controller
{
    public function index(){
        $cart = Cart::content();
        
        return view("carts.index", [
            'cart' => $cart
        ]);
    }

    public function add(Products $product){
        
        $productI = Products::find($product)->first();
        
        $cart = Cart::content()->where('productname',$product);
        
        if($productI->stock == 0){
            return view('carts.index',[
                'cart' => Cart::content()
            ]);
        }
        if($cart->count() == 0){
            Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
            'image' =>  $productI->image,
            'options'=>[
            'img' => $productI->image,
            'productname' => $productI->productname
            ]]);
                
            return view('carts.index',[
                'cart' => Cart::content()
            ])->with('message', 'Product Added to cart');
        }

        if(Cart::count() == 0){
            Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
            'image' =>  $productI->image,
            'options'=>[
            'img' => $productI->image,
            'productname' => $productI->productname
            ]]);

            return view('carts.index',[
                'cart' => Cart::content()
            ])->with('message', 'Product Added to cart');
        }

        foreach($cart as $items){
            $quantity = $items->qty;
            if(Cart::content()->contains('id',$id) == 1){
                if($productI->stock-1 >= $quantity){
                    Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                        'image' =>  $productI->image,
                        'options'=>[
                        'img' => $productI->image,
                        'productname' => $productI->productname
                    ]]);
                    

                    return view('carts.index',[
                        'cart' => Cart::content()
                    ])->with('message', 'Product Added to cart');
                }
                if($productI->stock-1 <= (int)$items->qty){
                    return view('carts.index',[
                        'cart' => Cart::content()
                    ])->with('message', 'Cannot Add Anymore!');
                }
            }
            elseif(Cart::content()->contains('id',$id) == null){
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                    'image' =>  $productI->image,
                    'options'=>[
                    'img' => $productI->image,
                    'productname' => $productI->productname
                    ]]);

                    return view('carts.index',[
                        'cart' => Cart::content()
                    ])->with('message', 'Product Added to cart');
            }
        }
    }
    
    public function remove(Request $request, $id){
        Cart::remove($id);
        return view('carts.index',[
            'cart' => Cart::content()
        ])->with('message', 'Product Removed!');
    }

    public function update(Request $request, $rowId, Products $product){

        $cart = Cart::get($rowId);
        $productI = Products::find($product)->first();

        if($productI->stock < request('num')){
            
            return view('carts.index',[
                'cart' => Cart::content()
            ])->with('message', 'Cannot Update!');

        }
        else{
            Cart::update($rowId, request('num'));
            return view('carts.index',[
                'cart' => Cart::content()
            ])->with('message', 'Product Updated!');
        }

    }
    
}
