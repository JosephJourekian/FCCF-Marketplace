@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
<div>
    <div style="float: left; width: 30%;" >
        <h1 class="font-bold  ">Add a new Category:</h1>
        <form method="POST" action='{{ route('products.addCategory') }}' enctype="multipart/form-data" class="mr-8">
        @csrf
            <input type="string" name="name" placeholder="Enter category name" required>
            <input class="bg-green-400 text-white rounded py-2 px-4 mt-3 hover:bg-green-300" type="submit" value="Submit">
        </form>
    </div>
    <h1 class="font-bold ">Delete a Category:</h1>
    <form method="POST" action='{{ route('products.deleteCategory') }}' enctype="multipart/form-data" class="mb-8">
        @csrf
        @method('DELETE')
        <select class="mr-4" name="name" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
            @endforeach        
        <input class="bg-green-400 text-white rounded py-2 px-4 mt-3 hover:bg-green-300" type="submit" value="Submit">
    </form>
</div>
<h1 class="font-bold  mb-4">Increase/decrease Inventory:</h1>
<div>
    <div>
        <form method="POST" action='{{ route('products.inventory.update') }}' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('PATCH')
            <table id="t01">
                <tr>
                  <th>Product Name</th>
                  <th>Current Stock</th>
                  <th>Categories</th>
                  <th>Stock Adjusment</th>
                  <th>Price (Points)</th>
                  <th>Add Categories (Ctrl + Click for multiple)</th>
                  <th>Remove Categories (Ctrl + Click for multiple)</th>
                  <th>View</th>
                </tr>
                <?php $index = 0 ?>
                @foreach ($products as $product)
                <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                      @foreach ($product->category as $categorie)
                         {{ $categorie->name }}<br>
                      @endforeach
                  </td>
                  <input hidden type="number" name="products[{{ $index }}][id]" value="{{ $product->id }}" required>
                  <td><input type="number" name="products[{{ $index }}][stock]" value="" ></td>
                  <td><input type="number" name="products[{{ $index }}][price]" value="{{ $product->price }}" ></td>
                  <td>
                    <select name="products[{{ $index }}][categories][]" multiple>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                    </select>
                  </td>
                  <td>
                    <select name="products[{{ $index }}][categoriesR][]" multiple>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                    </select>
                  </td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="{{ route('products.show',$product->productname) }}" class="card-link">View</a></button></td>
                </tr>
                <?php $index++ ?>
                @endforeach
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
@endcomponent