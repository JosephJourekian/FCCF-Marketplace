@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="{{ route('fccfUpdates.update',$update->updatename) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
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
            value="{{ $update->title }}"
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
            value="{{ $update->excerpt }}"
            required
        >{{ $update->excerpt }}</textarea>

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
                
            >
            <img src="{{ $update->image }}"
                    alt="product pic"
                    width="100"
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
        >{{ $update->body }}
        </textarea>

        @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
        >
            Submit
        </button>
        <a href="{{ route('fccfUpdates.index') }}"
                    class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
            >
                Back To Updates
        </a>
    </div>
</form>
@endcomponent