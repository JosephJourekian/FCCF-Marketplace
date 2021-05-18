@component('components.app')
<div class="border border-gray-300 rounded-lg">
    @if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="border border-gray-100 rounded-lg">
        <form method="POST" action='/products.delete' enctype="multipart/form-data" class="mb-8" >
            @csrf
            <h4 class="font-bold">Select a product to remove:</h4>
            <select id="id" name="id" class="form-control">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
@endcomponent