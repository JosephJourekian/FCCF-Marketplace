@component('components.app')
<h1 class="font-bold text-lg ">Checkout</h1>
    <div class="border border-gray-800 rounded-lg" sytle="float:left;">
        <h1 class="font-bold text-lg mb-3 block">Shipping Information:</h1>
        <h1 class="font-bold text-md block">Name: {{ auth()->user()->name }}</h1>
        <h1 class="font-bold text-md block">Email: {{ auth()->user()->email }}</h1>
        <h1 class="font-bold text-md block">Address: {{ auth()->user()->address }}</h1>
        <h1 class="font-bold text-md block">City: {{ auth()->user()->city }}</h1>
        <h1 class="font-bold text-md block">Province: {{ auth()->user()->province }}</h1>
        <h1 class="font-bold text-md block">Postal Code/Zip: {{ auth()->user()->postalCode }}</h1>
        <a class="font-bold text-md" style="color:blue"href="{{ route('profiles.edit',auth()->user()->id) }}">Change Shipping Info</a>
    </div>

    <div class="border border-gray-800 rounded-lg">
        <h1 class="font-bold text-lg mb-3 block">Order Summary:</h1>
            @foreach($cart as $product)
                <ol>
                    <li>
                        <h1 class="font-bold text-md block">Product Name: {{ $product->name }}</h1>
                        <h1 class="font-bold text-md block">Quantity: {{ $product->qty }}</h1>
                        <h1 class="font-bold text-md mb-4 block">Price: {{ $product->price }} Points</h1>
                    </li>
                </ol>
            @endforeach
        <h1 class="font-bold text-md block">Your Points: {{ auth()->user()->points }}</h1>
        <h1 class="font-bold text-md block">Subtotal: {{ Cart::subtotal('0','','')}} Points</h1>
        <h1 class="font-bold text-md block">Your Points After This Order: {{ Auth()->user()->points - Cart::subtotal('0','','')}} Points</h1>
    </div>
    <h1 class="font-bold text-md mb-4 block">An Email confirmation will be sent once the order has been submitted.</h1>
    <a href="{{ route('checkout.confirm') }}"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
            Confirm Order
        </a>

    <a href="{{ route('carts.index') }}"
            class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4">
                Back To Cart
        </a>
@endcomponent