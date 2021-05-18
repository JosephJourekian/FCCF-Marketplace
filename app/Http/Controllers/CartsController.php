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
        /*if(request('num') >= Products::where('id', $product_id)->update(['type'=> request('type')]);){
            Cart::update($id, request('num'));
        }*/
        Cart::update($id, request('num'));
        return view('carts.index',[
            'cart' => Cart::content()
        ])->with('message', 'Product Updated!');
    }
    
}
