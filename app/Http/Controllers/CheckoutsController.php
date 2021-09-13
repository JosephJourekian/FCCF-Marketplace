<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Models\ProductsAttribute;
use App\Mail\ShippingDetails;
use DB;
use Carbon\Carbon;




class CheckoutsController extends Controller
{
    
    public function index(){
        if(Cart::count() == 0){
            return redirect('products');
        }
        else{
            return view("checkout.index", [
                'cart' => Cart::content()
            ]);
        }
        
    }
    
    public function checkoutComplete(){
        if(Cart::count() == 0){
            return redirect('products');
        }
        else{
            return view("checkout.complete", [
                'cart' => Cart::content()
            ]);
        }
    }
    public function payment(Request $request){
        $method = $request->method;
        session(["shipping"=>$method]);

        try {
            $card = Crypt::decrypt(auth()->user()->card_number); 
            $cvc = Crypt::decrypt(auth()->user()->cvc); 
            $exp_date = Crypt::decrypt(auth()->user()->exp_date); 
        } catch (DecryptException $e) {
            $card = 'N/A';
            $cvc = 'N/A';
            $exp_date  = 'N/A';
        }
         
        
        if(Cart::count() == 0){
            return redirect('products');
        }
        else{
            return view("checkout.payment", [
                'cart' => Cart::content(),
                'shipping' => $method,
                'card_num' => $card,
                'cvc' => $cvc,
                'exp_date' => $exp_date
            ]);
        }
    }


    public function confirm(){

        $shipping = session("shipping");
        $shippingPrice = 0;

        if($shipping == 'standard'){
            $shippingPrice = 5.65;
        }
        elseif($shipping == 'express'){
            $shippingPrice = 11.30;
        }
        elseif($shipping == 'priority'){
            $shippingPrice = 16.95;
        }

        User::where('name', auth()->user()->name)->where('points','>','0')->decrement('points', (float)Cart::subtotal('0','','')); 
        $cart = Cart::content();
        $cartItem = Cart::content();

        foreach ($cart as $item){
            $nkey = $item->options->attributeId;
            $cItem = Cart::search(function ($cartItem, $rowId) use ($nkey) {
                return $cartItem->options->attributeId === $nkey;
            });
            Products::where('name', $item->name)->where('stock','>','0')->decrement('stock', $item->qty); 
            foreach($cItem as $temp){
                $val = ProductsAttribute::find($temp->options->attributeId);
                ProductsAttribute::where('id', $temp->options->attributeId)->where('stock','>','0')->decrement('stock', $item->qty);
            }
            
        }
            $attributes = ([
                'user_id' => auth()->user()->id,
                'product_id' => $item->id,
                'cart' => serialize(Cart::content()),
                'order_subtotal' => Cart::subtotal('0','',''),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'shippingMethod' => $shipping,
                'shippingPrice' => $shippingPrice
                
            ]);
            DB::table('orders')->insert($attributes);
        
        Mail::to(auth()->user()->email)->send(new OrderConfirmation($shipping,$shippingPrice), ['cart' => $cart]);
        Mail::to('jjourekian@gmail.com')->send(new ShippingDetails($shipping,$shippingPrice), ['cart' => $cart, 'shipping' => $shipping, 'shippingPrice'=> $shippingPrice]);
        
        Cart::destroy();

        return view('checkout.complete');
    }
}