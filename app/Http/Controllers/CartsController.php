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
        $cart = Cart::content()->where('id',$id);
        
        if($product->stock == 0){
            return view('carts.index',[
                'cart' => Cart::content()
            ]);
        }
        if($cart->count() == 0){
            //dd($cart);
            Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,
            'image' =>  $product->image,
            'options'=>[
            'img' => $product->image
            ]]);
                
            return view('carts.index',[
                'cart' => Cart::content()
            ])->with('message', 'Product Added to cart');
        }

        if(Cart::count() == 0){
            Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,
            'image' =>  $product->image,
            'options'=>[
            'img' => $product->image
            ]]);

            return view('carts.index',[
                'cart' => Cart::content()
            ])->with('message', 'Product Added to cart');
        }

        foreach($cart as $items){
            $quantity = $items->qty;
            if(Cart::content()->contains('id',$id) == 1){
                if($product->stock-1 >= $quantity){
                    Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,
                        'image' =>  $product->image,
                        'options'=>[
                        'img' => $product->image
                    ]]);

                    return view('carts.index',[
                        'cart' => Cart::content()
                    ])->with('message', 'Product Added to cart');
                }
                if($product->stock-1 <= (int)$items->qty){
                    return view('carts.index',[
                        'cart' => Cart::content()
                    ])->with('message', 'Cannot Add Anymore!');
                }
            }
            elseif(Cart::content()->contains('id',$id) == null){
                Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,
                    'image' =>  $product->image,
                    'options'=>[
                    'img' => $product->image
                    ]]);
                    dd([$product->stock, $quantity]);

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

    public function update(Request $request, $rowId, $id){

        $cart = Cart::get($rowId);
        $product = Products::find($id);

        if($product->stock < request('num')){
            
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
