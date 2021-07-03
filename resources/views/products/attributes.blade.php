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
                  <!--<th>Stock</th>-->
                  <th>Attributes</th>
                  <th>Add 1st Attribute Name</th>
                  <th>Add 1st Attribute Value</th>
                  <th>Add 2nd Attribute Name</th>
                  <th>Add 2nd Attribute Value</th>
                  <th>Stock</th>
                  <th>Remove Attribute</th>
                  <th>Add/Remove stock</th>
                </tr>
                <?php $index = 0 ?>
                @foreach ($products as $product)
                <tr>
                  <td>{{ $product->name }}</td>
                  <!--<td>{{ $product->stock }}</td>-->
                  <td style="white-space: nowrap;overflow:hidden;">
                      @foreach ($product->attributes as $attribute)
                        <li>{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}, {{ $attribute->attribute_second_name }}: {{ $attribute->attribute_second_value }}, Stock: {{ $attribute->stock }}</li><br>
                      @endforeach
                  </td>
                  <input hidden type="number" name="products[{{ $index }}][id]" value="{{ $product->id }}" required>
                  <td><input type="text" name="products[{{ $index }}][attributeName]" value=""  size="10"></td>
                  <td><input type="text" name="products[{{ $index }}][attributeValue]" value="" size="10"></td>
                  <td><input type="text" name="products[{{ $index }}][attributeName2]" value="" size="10"></td>
                  <td><input type="text" name="products[{{ $index }}][attributeValue2]" value="" size="10"></td>
                  <td><input type="number" name="products[{{ $index }}][stock]" value="" style="width: 3em"></td>
                  <td>
                    <select name="products[{{ $index }}][attribute][]" multiple>
                        @foreach($product->attributes as $attribute)
                           <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}: {{ $attribute->attribute_value }}, {{ $attribute->attribute_second_name }}: {{ $attribute->attribute_second_value }}</option>
                        @endforeach
                    </select>
                  </td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="{{ route('products.attributesStock',$product->productname) }}" class="card-link">Edit</a></button></td>
                </tr>
                <?php $index++ ?>
                @endforeach
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
@endcomponent