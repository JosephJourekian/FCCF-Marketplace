@component('mail::message')
# Order Confirmation

Hello {{ auth()->user()->name }},<br> 
Thank you for your purchase!<br>
Order summary:<br>
@foreach ($cart as $product)
<h2 class="font-bold text-md block">Product Name: {{ $product->name }}</h2>
<h2 class="font-bold text-md block">Quantity: {{ $product->qty }}</h2>
<h2 class="font-bold text-md ">Attributes: {{ $product->options->attributename }}: {{ $product->options->attributevalue }}, {{ $product->options->attributename2 }}: {{ $product->options->attributevalue2 }}</h2>
<h2 class="font-bold text-md block">Price: {{ $product->price }} Points</h2>
<h2 class="font-bold text-md block">Total Product Price: {{ $product->subtotal('0','','') }} Points</h2><br>
@endforeach
<h2 class="font-bold text-md mb-4 block">Subtotal: {{ Cart::subtotal('0','','')}} Points</h2>
<h2 class="font-bold text-md mb-4 block">Point Balance After Purchase: {{ auth()->user()->points - Cart::subtotal('0','','')}} Points</h2>
<h2 class="font-bold text-md mb-4 block">Shipping Method: {{$shipping }}</h2>
<h2 class="font-bold text-md mb-4 block">Shipping Amount Paid: {{$shippingPrice}} $</h2>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
