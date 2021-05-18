@component('components.app')
<h1 class="font-bold  mb-4">Increase/decrease Inventory:</h1>
<div>
    @if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
    
    <div>
        <form method="POST" action='#' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('PATCH')
            
            <table id="t01">
                <tr>
                  <th>Product Name</th>
                  <th>Current Stock</th>
                  <th>Amount</th>
                  <th>View</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->stock }}</td>
                  <td><input type="number" id="{{ $product->id }}" name="{{ $product->name }}" value="{{ $product->stock }}"placeholder="0" required></td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="{{ route('products.show',$product->id) }}" class="card-link">View</a></button></td>
                </tr>
                @endforeach
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
@endcomponent