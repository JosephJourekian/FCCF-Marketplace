@component('mail::message')
# {{ auth()->user()->name }} Has Placed An Order!

Hello Mckenzie,<br> 
{{ auth()->user()->name }} has placed an order on the marketplace.<br>
Order summary:<br>
@foreach ($cart as $product)
<h2 class="font-bold text-md block">Product Name: {{ $product->name }}</h2>
<!--<img class="rounded-lg" src="{{ $product->options->img }}" style="width:150px;height:125px;float:left"><br>-->
<h2 class="font-bold text-md block">Quantity: {{ $product->qty }}</h2>
<h2 class="font-bold text-md block">Price: {{ $product->price }} Points</h2>
<h2 class="font-bold text-md block">Total Product Price: {{ $product->subtotal('0','','') }} Points</h2><br>
@endforeach
<h2 class="font-bold text-md mb-4 block">Subtotal: {{ Cart::subtotal('0','','')}} Points</h2>
<h2 class="font-bold text-md mb-4 block">Point Balance After Purchase: {{auth()->user()->points - Cart::subtotal('0','','')}} Points</h2>

Shipping Details:<br>

Name: {{ auth()->user()->name }}<br>
Email: {{ auth()->user()->email }}<br>
Adress: {{ auth()->user()->address }}<br>
City: {{ auth()->user()->city }}<br>
Province: {{ auth()->user()->province }}<br>
Zip Code: {{ auth()->user()->postalCode }}<br>
Phone Number: {{ auth()->user()->phone }}<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
