<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
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

    public function confirm(){
        User::where('name', auth()->user()->name)->where('points','>','0')->decrement('points', (float)Cart::subtotal('0','','')); 
        $cart = Cart::content();
        
        foreach ($cart as $product){
            Products::where('name', $product->name)->where('stock','>','0')->decrement('stock', $product->qty); 
        }
            $attributes = ([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'cart' => serialize(Cart::content()),
                'order_subtotal' => Cart::subtotal('0','',''),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                
            ]);
            DB::table('orders')->insert($attributes);
        
        Mail::to(auth()->user()->email)->send(new OrderConfirmation(), ['cart' => $cart]);
        Mail::to('jjourekian@gmail.com')->send(new ShippingDetails(), ['cart'=> $cart]);
        
        Cart::destroy();
        return redirect('/products')->with('message', 'Order Confirmed!');
    }
}