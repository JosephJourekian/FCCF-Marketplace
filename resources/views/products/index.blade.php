<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }
    
    .price {
      color: grey;
      font-size: 22px;
    }
    
    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }
    
    .card button:hover {
      opacity: 0.7;
    }
    #header {
    width: 100%;
    background-color: red;
    height: 30px;
    }
    .row {
    display: -webkit-box;
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    }

    .divClass{
      background-repeat:no-repeat;
      background-size:cover;
      width:500px;
      height:200px;
    }
</style>
@component('components.app')
  @if(session()->has('message'))
  <div class="alert alert-success font-bold color:green" >
      {{ session()->get('message') }}
  </div>
  @endif
  <div class="mb-6">
    <h1 class="font-bold ">Filter Products by Category:</h1>
    <div class="dropdown">
      <button class="dropbtn">Categories</button>
      <div class="dropdown-content">
        @foreach($category as $categorie)
          <a class="font-bold text-md" href="{{ route('products.index', ['category' => $categorie->name]) }}">{{ $categorie->name }}</a>
        @endforeach 
      </div>
    </div>
  <div class="row mb-3">
    <?php $index = 0 ?>
        @foreach($products as $product) 
            <div class="col-3">   
                <div class="card mb-5">
                <img src="{{ $product->image }}" class="divClass" alt="Test image">
                <h1>{{ $product->name }}</h1>
                <p class="price">{{ $product->price }} Points</p>
                <p>Stock: {{ $product->stock }}</p>
                <p>{{ \Illuminate\Support\Str::limit($product->description, 20) }}</p>
                </p>
                <p>
                  @foreach ($product->category as $categories)
                      @if ($categories->name == "Apparel")
                      <select name="products[{{ $index }}][size]">
                          @foreach($product->attributes as $attribute)
                              @if($attribute->attribute_name == "Size")
                                  <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}</option>
                              @endif
                          @endforeach
                      </select>
                      <select name="products[{{ $index }}][color]">
                          @foreach($product->attributes as $attribute)
                              @if($attribute->attribute_name == "Color")
                                  <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}</option>
                              @endif
                          @endforeach
                      </select>
                      @endif
                  @endforeach
              </p>
                @if($product->stock == 0)
                  <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="#" class="card-link">Out of Stock</a></button></p>
                @else
                  <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="{{ route('carts.add',$product->productname) }}" class="card-link">Add to Cart</a></button></p>
                @endif
                <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="{{ route('products.show',$product->productname) }}" class="card-link">View Product</a></button></p>
                @if(auth()->user()->isAdmin())
                 <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="{{ route('products.edit',$product->productname) }}" class="card-link">Edit Product</a></button></p>
                 <form method="POST" action="{{ route('products.delete') }}"> 
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{ $product->id }}"> 
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-300">Remove</button>
                </form>
                @endif
                </div>
            </div>
            <?php $index++ ?>
        @endforeach
    </div>
@endcomponent