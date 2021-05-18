@component('components.app')
    @if(!empty($message))
    <div class="alert alert-success font-bold color:green" >
       {{ $message }}
    </div>
    @endif
    <h1 class="font-bold text-lg mb-4 block">Shopping Cart</h1>
    @if(Cart::count() == 0)
        <h1 class="font-bold text-md mb-4 block" style="text-align: center">Cart Empty!</h1>
    @else
        @foreach($cart as $product)
        <div class="border border-gray-800 rounded-lg">
            <img class="rounded-lg" src="{{ $product->options->img }}" style="width:150px;height:125px;float:left">
            <a class="font-bold text-md" style="color:blue"href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a>
            <h1 class="font-bold text-md mt-4 block">Quantity: {{ $product->qty }}</h1>
            <form method="POST" action='{{ route('carts.update',$product->rowId) }}' enctype="multipart/form-data" >
             @csrf
                <p>Update Quantity: <input type="number" id="num" name="num" value="1">
                    <input class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4" 
                    type="submit" value="Update" name="update" id="update">
                    <a href="{{ route('carts.remove',$product->rowId) }}"
                        class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4">
                    Remove
                </a>
                </p>
            </form>
            <h1 class="font-bold text-md mb-4 block">Price: {{ $product->price }} Points</h1>
            <h1 class="font-bold text-md mb-4 block">Total: {{ $product->subtotal('0','','') }} Points</h1>
        </div>
        @endforeach
        <h1 class="font-bold text-md mb-4 block">Subtotal: {{ Cart::subtotal('0','','')}} Points</h1>

        @if(((float)auth()->user()->points) >= ((float)Cart::subtotal('0','','')))
            <a href="{{ route('checkout.index') }}"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
            Checkout</a>

            @else
            <a href="#"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
            Insufficient amount of points!</a>
        @endif

        <a href="{{ route('products.index') }}"
            class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4">
                Back To Products
        </a>
        
    @endif
@endcomponent