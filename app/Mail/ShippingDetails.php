<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\ShippingDetails;
use Cart;

class ShippingDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $shipping;
    public $shippingPrice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shipping, $shippingPrice)
    {
        $this->shipping = $shipping;
        $this->shippingPrice = $shippingPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart = Cart::content();
    
        return $this->markdown('emails.ship')
            ->with('cart',$cart);
    }
}
