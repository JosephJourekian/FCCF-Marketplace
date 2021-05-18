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
        $cart = Cart::content();

        User::where('name', auth()->user()->name)->where('points','>','0')->decrement('points', (float)Cart::subtotal('0','','')); 
        $data = [
            'cart' => Cart::content()
        ];
        foreach ($cart as $product){
            Products::where('name', $product->name)->where('stock','>','0')->decrement('stock', $product->qty); 
        }


        foreach($cart as $product){
            $attributes = ([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_qty' => $product->qty,
                'product_image' => $product->options->img,
                'order_subtotal' => Cart::subtotal('0','',''),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                
            ]);
        
            DB::table('orders')->insert($attributes);
    
        }
        
        Mail::to(auth()->user()->email)->send(new OrderConfirmation(), $data);
        Mail::to('jjourekian@gmail.com')->send(new ShippingDetails(), $data);
        Cart::destroy();
        return redirect('/products')->with('message', 'Order Confirmed!');

    }

}