@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
<div>
<h1 class="font-bold  mb-4">Edit Products Attributes:</h1>
<div>
    <div>
        <form method="POST" action='{{ route('products.attributes') }}' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('POST')
            <table id="t01">
                <tr>
                  <th>Product Name</th>
                  <th>Stock</th>
                  <th>Attributes</th>
                  <th>Add Attribute Name</th>
                  <th>Add Attribute Value</th>
                  <th>Remove Attribute</th>
                  <!--<th>Add Individual Stock</th>-->
                </tr>
                <?php $index = 0 ?>
                @foreach ($products as $product)
                <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                      @foreach ($product->attributes as $attribute)
                        <li>{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }},</li> <!--, Stock: {{ $attribute->stock }}-->
                      @endforeach
                  </td>
                  <input hidden type="number" name="products[{{ $index }}][id]" value="{{ $product->id }}" required>
                  <td><input type="text" name="products[{{ $index }}][attributeName]" value="" ></td>
                  <td><input type="text" name="products[{{ $index }}][attributeValue]" value="" ></td>
                  <td>
                    <select name="products[{{ $index }}][attribute][]" multiple>
                        @foreach($product->attributes as $attribute)
                           <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}</option>
                        @endforeach
                    </select>
                  </td>
                  <!--<td><input type="number" name="products[{{ $index }}][individualStock]" value="" ></td>-->
                </tr>
                <?php $index++ ?>
                @endforeach
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
@endcomponent