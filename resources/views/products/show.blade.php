@component('components.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div>
    <div>
        <form method="GET" action='{{ route('carts.add',$product->productname) }}' enctype="multipart/form-data" class="mb-8"  >
            @csrf
            
            <div id="demo" class="carousel slide carousel-fade " data-ride="carousel" style="float: none; position:absolute">
    
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{ $product->image }}" style="width:400px;height:300px;">
                    </div>
                    @foreach( $product->images as $pic )
                       <div class="carousel-item {{ $loop->first }}">
                           <img style="width:450px;height:350px;" class="d-block img-fluid" src="{{ asset("storage/{$pic->image}") }}">
                       </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              
            </div>

        <div style="float:right">
            <h1 class="font-bold mb-8" style="font-size:300%;">{{ $product->name }}</h1>
            
            <p style="font-size:150%; mb-5">{{ $product->description }}</p>
            <p >Stock: {{ $product->stock }}</p>
            <h2 class="font-bold mt-15" style="font-size:200%">{{ $product->price }} Points</h2> 
            <p class="font-bold mt-2" >
                @foreach ($product->category as $categories)
                    <a  href="{{ route('products.index', ['category' => $categories->name]) }}"><u>{{ $categories->name }}</u></a>
                @endforeach
            </p>
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
                    <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Add to Cart">       
                @endif
                <a href="{{ route('products.index') }}"
                        class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
                >
                    Back To Products
                </a>
            </div>
        </div>
        
        </form>
    </div>
</div>
@endcomponent