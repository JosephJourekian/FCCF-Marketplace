@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="{{ route('techUpdates.store') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="name"
        >
            Update Name
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
            for="excerpt"
        >
            excerpt
        </label>

        <textarea class="border border-gray-400 p-2 w-full"
            type="text"
            name="excerpt"
            id="excerpt"
            value=""
            required
        ></textarea>

        @error('excerpt')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="image"
        >
           Update Picture
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
            for="body"
        >
            Body
        </label>

        <textarea class="textarea border border-gray-400 p-2 w-full"
            type="body"
            name="body"
            id="body"
            value=""
            required
        >
        </textarea>

        @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="url"
        >
            Links (for multiple put a comma and space after each link)
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="url"
            id="url"
            autofocus
            value=""
            required
        
        >

        @error('url')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
        >
            Submit
        </button>

    </div>
</form>
@endcomponent