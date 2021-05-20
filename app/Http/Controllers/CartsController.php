<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;

class CartsController extends Controller
{
    public function index(){
        //$cart = serialize(Cart::content());
        $cart = Cart::content();
        //return $cart;
        return view("carts.index", [
            'cart' => $cart
        ]);
    }

    public function add($id){
        $product = Products::find($id);
        
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,
         'image' =>  $product->image,
         'options'=>[
             'img' => $product->image
         ]]);

        return view('carts.index',[
            'cart' => Cart::content()
        ])->with('message', 'Product Added to cart');

    }
    
    public function remove(Request $request, $id){
        Cart::remove($id);
        return view('carts.index',[
            'cart' => Cart::content()
        ])->with('message', 'Product Removed!');
    }

    public function update(Request $request, $id){
        Cart::update($id, request('num'));
        return view('carts.index',[
            'cart' => Cart::content()
        ])->with('message', 'Product Updated!');
    }
    
}
