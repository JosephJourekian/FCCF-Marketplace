@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="{{ route('products.update',$product->productname)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="name"
        >
            Product Name
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="name"
            id="name"
            value="{{ $product->name }}"
            required
        >

        @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="price"
        >
            Price
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="price"
            id="price"
            value="{{ $product->price }}"
            required
        >

        @error('price')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="image"
        >
            Product Picture
        </label>

        <div class="flex">
            <input class="border border-gray-400 p-2 w-full"
                type="file"
                name="image"
                id="image"
            >
            <img src="{{ $product->image }}"
                    alt="product pic"
                    width="40"
                >
        </div>

        @error('image')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="description"
        >
            Product Description
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="description"
            name="description"
            id="description"
            value="{{ $product->description }}"
            required
        >

        @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="stock"
        >
            Stock
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="number"
            name="stock"
            id="stock"
            value="{{ $product->stock }}"
            required
        >

        @error('stock')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
        >
            Submit
        </button>
        <a href="{{ route('products.index') }}"
                    class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
            >
                Back To Products
        </a>

    </div>
</form>
@endcomponent