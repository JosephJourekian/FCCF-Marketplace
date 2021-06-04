<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductsAttribute;
use App\Models\Category;
use Cart;

class CartsController extends Controller
{
    public function index(){
        $cart = Cart::content();
        
        return view("carts.index", [
            'cart' => $cart,
            'categories' => Category::all()
        ]);
    }

    public function add(Products $product, Request $request){

        if(request("size") != null && request('color') != null){
            $productI = Products::find($product)->first();
            $cart = Cart::content()->where('id',$productI->id);
            $size = ProductsAttribute::find(request('size'));
            $color = ProductsAttribute::find(request('color'));
            
            if($productI->stock == 0){
                return view('carts.index',[
                    'cart' => Cart::content(),
                    'categories' => Category::all()
                ]);
            }

            if($cart->count() == 0){
                
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                'image' =>  $productI->image,
                'options'=>[
                'img' => $productI->image,
                'productname' => $productI->productname,
                'size' => $size->attribute_value,
                'color' => $color->attribute_value

                ]]);
                    
                return view('carts.index',[
                    'cart' => Cart::content(),
                    'categories' => Category::all()
                ])->with('message', 'Product Added to cart');
            }

            if(Cart::count() == 0){
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                'image' =>  $productI->image,
                'options'=>[
                'img' => $productI->image,
                'productname' => $productI->productname,
                'size' => $size->attribute_value,
                'color' => $color->attribute_value
                ]]);

                return view('carts.index',[
                    'cart' => Cart::content(),
                    'categories' => Category::all()
                ])->with('message', 'Product Added to cart');
            }

            foreach($cart as $items){
                $quantity = $items->qty;
                if(Cart::content()->contains('id',$items->id) == 1){
                    if($productI->stock-1 >= $quantity){
                        Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                            'image' =>  $productI->image,
                            'options'=>[
                            'img' => $productI->image,
                            'productname' => $productI->productname,
                            'size' => $size->attribute_value,
                            'color' => $color->attribute_value
                        ]]);

                        return view('carts.index',[
                            'cart' => Cart::content(),
                            'categories' => Category::all()
                        ])->with('message', 'Product Added to cart');
                    }
                    if($productI->stock-1 <= (int)$items->qty){
                        return view('carts.index',[
                            'cart' => Cart::content(),
                            'categories' => Category::all()
                        ])->with('message', 'Cannot Add Anymore!');
                    }
                }
                elseif(Cart::content()->contains('id',$id) == null){
                    Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                        'image' =>  $productI->image,
                        'options'=>[
                        'img' => $productI->image,
                        'productname' => $productI->productname,
                        'size' => $size->attribute_value,
                        'color' => $color->attribute_value
                        ]]);

                        return view('carts.index',[
                            'cart' => Cart::content(),
                            'categories' => Category::all()
                        ])->with('message', 'Product Added to cart');
                }
            }
        }
        $productI = Products::find($product)->first();
        $cart = Cart::content()->where('id',$productI->id);
        
        if($productI->stock == 0){
            return view('carts.index',[
                'cart' => Cart::content(),
                'categories' => Category::all()
            ]);
        }

        if($cart->count() == 0){
            
            Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
            'image' =>  $productI->image,
            'options'=>[
            'img' => $productI->image,
            'productname' => $productI->productname,
            'size' => 'N/A',
            'color' => 'N/A'
            ]]);
                
            return view('carts.index',[
                'cart' => Cart::content(),
                'categories' => Category::all()
            ])->with('message', 'Product Added to cart');
        }

        if(Cart::count() == 0){
            Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
            'image' =>  $productI->image,
            'options'=>[
            'img' => $productI->image,
            'productname' => $productI->productname,
            'size' => 'N/A',
            'color' => 'N/A'
            ]]);

            return view('carts.index',[
                'cart' => Cart::content(),
                'categories' => Category::all()
            ])->with('message', 'Product Added to cart');
        }

        foreach($cart as $items){
            $quantity = $items->qty;
            if(Cart::content()->contains('id',$items->id) == 1){
                if($productI->stock-1 >= $quantity){
                    Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                        'image' =>  $productI->image,
                        'options'=>[
                        'img' => $productI->image,
                        'productname' => $productI->productname,
                        'size' => 'N/A',
                        'color' => 'N/A'
                    ]]);

                    return view('carts.index',[
                        'cart' => Cart::content(),
                        'categories' => Category::all()
                    ])->with('message', 'Product Added to cart');
                }
                if($productI->stock-1 <= (int)$items->qty){
                    return view('carts.index',[
                        'cart' => Cart::content(),
                        'categories' => Category::all()
                    ])->with('message', 'Cannot Add Anymore!');
                }
            }
            elseif(Cart::content()->contains('id',$id) == null){
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                    'image' =>  $productI->image,
                    'options'=>[
                    'img' => $productI->image,
                    'productname' => $productI->productname,
                    'size' => 'N/A',
                    'color' => 'N/A'
                    ]]);

                    return view('carts.index',[
                        'cart' => Cart::content(),
                        'categories' => Category::all()
                    ])->with('message', 'Product Added to cart');
            }
        }
    }
    
    public function remove(Request $request, $id){
        Cart::remove($id);
        return view('carts.index',[
            'cart' => Cart::content(),
            'categories' => Category::all()
        ])->with('message', 'Product Removed!');
    }

    public function update(Request $request, $rowId, Products $product){

        $cart = Cart::get($rowId);
        $productI = Products::find($product)->first();

        if($productI->stock < request('num')){
            
            return view('carts.index',[
                'cart' => Cart::content(),
                'categories' => Category::all()
            ])->with('message', 'Cannot Update!');

        }
        else{
            Cart::update($rowId, request('num'));
            return view('carts.index',[
                'cart' => Cart::content(),
                'categories' => Category::all()
            ])->with('message', 'Product Updated!');
        }

    }
    
}
