@component('components.app')
<div>
    <div>
        <img src="{{ $product->image }}" style="width:450px;height:500px;float:left">
        <h1 class="font-bold mb-8" style="font-size:300%;">{{ $product->name }}</h1>
        <p style="font-size:150%; mb-5">{{ $product->description }}</p>
        <p >Stock: {{ $product->stock }}</p>
        <h2 class="font-bold mt-15" style="font-size:200%">{{ $product->price }} Points</h2>
        <div class="mt-3">
            @if($product->stock == 0)
                <a href="#"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                    Out of Stock
                </a>
            @else
                <a href="{{ route('carts.add',$product->id) }}"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                    Add To Cart
                </a>            
            @endif
            <a href="{{ route('products.index') }}"
                    class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
            >
                Back To Products
            </a>
        </div>
    </div>
</div>
@endcomponent