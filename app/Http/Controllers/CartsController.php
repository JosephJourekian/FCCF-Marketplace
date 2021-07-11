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
        //dd(Cart::content());
        //dd(request('attribute'));
        if(request("attribute") != null){
            //dd('check');
            $productI = Products::find($product)->first();
            $cart = Cart::content()->where('id',$productI->id);
            $attribute = ProductsAttribute::find(request('attribute'));
            $attributeId = $attribute->id;
            $attributeName = $attribute->attribute_name;
            $attributeValue = $attribute->attribute_value;
            $attributeName2 = $attribute->attribute_second_name;
            $attributeValue2 = $attribute->attribute_second_value;
            $attributeStock = $attribute->stock;
            

            if($productI->stock == 0){ 
                return view('carts.index',[
                    'cart' => Cart::content(),
                    'categories' => Category::all()
                ]);
            }
            

            if($cart->count() == 0){
                //dd('Yo4');
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                'image' =>  $productI->image,
                'options'=>[
                'img' => $productI->image,
                'productname' => $productI->productname,
                'attributeId' => $attributeId,
                'attributename' => $attributeName,
                'attributevalue' => $attributeValue,
                'attributename2' => $attributeName2,
                'attributevalue2' => $attributeValue2,
                'attributeStock' => $attributeStock

                ]]);
                    
                return view('carts.index',[
                    'cart' => Cart::content(),
                    'categories' => Category::all()
                ])->with('message', 'Product Added to cart');
            }

            if(Cart::count() == 0){
                dd('Yo3');
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                'image' =>  $productI->image,
                'options'=>[
                'img' => $productI->image,
                'productname' => $productI->productname,
                'attributeId' => $attributeId,
                'attributename' => $attributeName,
                'attributevalue' => $attributeValue,
                'attributename2' => $attributeName2,
                'attributevalue2' => $attributeValue2,
                'attributeStock' => $attributeStock
                ]]);

                return view('carts.index',[
                    'cart' => Cart::content(),
                    'categories' => Category::all()
                ])->with('message', 'Product Added to cart');
            }

            
            $cartItem = Cart::content();
            $nkey = (int)request('attribute');
            $cItem = Cart::search(function ($cartItem, $rowId) use ($nkey) {
                return $cartItem->options->attributeId === $nkey;
            });

            
            if($cItem->isEmpty() == false) //if it's in the cart
            {
                foreach($cItem as $items){
                    if((int)$items->qty < $items->options->attributeStock){ //if the added product doesn't excede the stock
                        Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                            'image' =>  $productI->image,
                            'options'=>[
                            'img' => $productI->image,
                            'productname' => $productI->productname,
                            'attributeId' => $attributeId,
                            'attributename' => $attributeName,
                            'attributevalue' => $attributeValue,
                            'attributename2' => $attributeName2,
                            'attributevalue2' => $attributeValue2,
                            'attributeStock' => $attributeStock
                        ]]);

                        return view('carts.index',[
                            'cart' => Cart::content(),
                            'categories' => Category::all()
                        ])->with('message', 'Product Added to cart');
                    }
                    else{//product excedes the stock
                        return view('carts.index',[
                            'cart' => Cart::content(),
                            'categories' => Category::all()
                        ])->with('message', 'Cannot Add Anymore!');
                    }
                }
            }
            else{   //if it's not in the cart
                Cart::add(['id' => $productI->id, 'name' => $productI->name, 'qty' => 1, 'price' => $productI->price,
                        'image' =>  $productI->image,
                        'options'=>[
                        'img' => $productI->image,
                        'productname' => $productI->productname,
                        'attributeId' => $attributeId,
                        'attributename' => $attributeName,
                        'attributevalue' => $attributeValue,
                        'attributename2' => $attributeName2,
                        'attributevalue2' => $attributeValue2,
                        'attributeStock' => $attributeStock
                    ]]);

                    return view('carts.index',[
                        'cart' => Cart::content(),
                        'categories' => Category::all()
                    ])->with('message', 'Product Added to cart');
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
            'attributeId' => 'N/A',
            'attributename' => 'N/A',
            'attributevalue' => 'N/A',
            'attributename2' => 'N/A',
            'attributevalue2' => 'N/A',
            'attributeStock' => 'N/A'
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
            'attributeId' => 'N/A',
            'attributename' => 'N/A',
            'attributevalue' => 'N/A',
            'attributename2' => 'N/A',
            'attributevalue2' => 'N/A',
            'attributeStock' => 'N/A'
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
                        'attributeId' => 'N/A',
                        'attributename' => 'N/A',
                        'attributevalue' => 'N/A',
                        'attributename2' => 'N/A',
                        'attributevalue2' => 'N/A',
                        'attributeStock' => 'N/A'
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
                    'attributeId' => 'N/A',
                    'attributename' => 'N/A',
                    'attributevalue' => 'N/A',
                    'attributename2' => 'N/A',
                    'attributevalue2' => 'N/A',
                    'attributeStock' => 'N/A'
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
