@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
<div>
<h1 class="font-bold  mb-4">Edit {{ $product->name }} Attributes Stocks:</h1>
<div>
    <div>
        <form method="POST" action='{{ route('products.attributesStockUpdate') }}' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('PATCH')    
            <table id="t01">
                <tr>
                  <th>Attributes</th>
                  <th>Current Stock</th>
                  <th>Stock Adjustment</th>
                </tr>
                <?php $index = 0 ?>
                @foreach ($product->attributes as $attribute)
                <tr>
                  <td>{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}, {{ $attribute->attribute_second_name }}: {{ $attribute->attribute_second_value }}</td>
                  <td>{{ $attribute->stock }}</td>
                  <input hidden type="number" name="products[{{ $index }}][productId]" value="{{ $product->id }}" required>
                  <input hidden type="number" name="products[{{ $index }}][id]" value="{{ $attribute->id }}" required>
                  <td><input type="number" name="products[{{ $index }}][stock]" value="" style="width: 9em"></td>
                <?php $index++ ?>
                @endforeach
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
            <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-300"><a href="{{ route('products.attributes') }}" class="card-link">Back to Attributes</a></button>
        </form>
    </div>
</div>
@endcomponent