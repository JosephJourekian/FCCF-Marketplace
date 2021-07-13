@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="name"
        >
            Full Product Name
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="name"
            id="name"
            autofocus
            value=""
            required
        >

        @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="productname"
        >
            Productname
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="productname"
            id="productname"
            autocomplete="productname"
            value="{{ old('productname') }}"
            required
        >

        @error('productname')
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
            value=""
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
           Main Product Picture
        </label>

        <div class="flex">
            <input class="border border-gray-400 p-2 w-full"
                type="file"
                name="image"
                id="image"
                required
                
            >
        </div>

        @error('image')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="otherImages[]"
        >
            Other Product Pictures (Ctrl + Click for multiple)
        </label>

        <div class="flex">
            <input class="border border-gray-400 p-2 w-full"
                type="file"
                name="otherImages[]"
                id="otherImages[]"
                multiple
            >
        </div>

        @error('otherImages')
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
            value=""
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
            required
        >

        @error('stock')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <!--<div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="attribute"
        >
            Attribute (Color, Size, Brand etc)
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="attribute"
            id="attribute"
            
        >
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="attributeValue"
        >
            Attribute Value (Yellow, Large, Nike etc)
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="attributeValue"
            id="attributeValue"
        >
    </div>-->

    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
        >
            Submit
        </button>

    </div>
</form>
@endcomponent