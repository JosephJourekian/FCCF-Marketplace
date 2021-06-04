@component('components.app')
<div>
    <div>
        <form method="GET" action='{{ route('carts.add',$product->productname) }}' enctype="multipart/form-data" class="mb-8" >
            @csrf
            <img src="{{ $product->image }}" style="width:450px;height:500px;float:left">
            <h1 class="font-bold mb-8" style="font-size:300%;">{{ $product->name }}</h1>
            <p style="font-size:150%; mb-5">{{ $product->description }}</p>
            <p >Stock: {{ $product->stock }}</p>
            <h2 class="font-bold mt-15" style="font-size:200%">{{ $product->price }} Points</h2> 
            <p>
                @foreach ($product->category as $categories)
                    @if ($categories->name == "Apparel")
                    <p class="font-bold">Select Size and Color:</p>
                    <select name="size">
                        @foreach($product->attributes as $attribute)
                            @if($attribute->attribute_name == "Size")
                                <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}</option>
                            @endif
                        @endforeach
                    </select>
                    <select name="color">
                        @foreach($product->attributes as $attribute)
                            @if($attribute->attribute_name == "Color")
                                <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                @endforeach
            </p>
            <div class="mt-3">
                @if($product->stock == 0)
                    <a href="#"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                        Out of Stock
                    </a>
                @else
                    <a href="{{ route('carts.add',$product->productname) }}"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                        Add To Cart()
                    </a>            
                @endif
                <a href="{{ route('products.index') }}"
                        class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
                >
                    Back To Products
                </a>
                <p class="font-bold mt-8" >
                    @foreach ($product->category as $categories)
                        <a  href="{{ route('products.index', ['category' => $categories->name]) }}"><u>{{ $categories->name }}</u></a>
                    @endforeach
                </p>
            </div>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Add to Cart">
        </form>
    </div>
</div>
@endcomponent