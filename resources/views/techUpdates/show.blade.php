@component('components.app')

<h1 class="font-bold text-6xl mb-2 block">{{ $update->title }}</h1>

<div class="border border-gray-800 rounded-lg mb-2">
    <img class="rounded-lg mb-4" src="{{ $update->image}}" style="width:350px;height:200px;float:left; position: relative;">
    <h1 class="font-bold text-md mt-1 ml-2 flex block">Posted on: {{ $update->created_at->format('Y-m-d')}}</h1>
    <h1 class="font-bold text-md block">By: {{ $update->author }}</h1>              
    <h1 class="font-bold text-md block mb-10 mt-6">{{ $update->excerpt }}</h1>
    <h1 class="font-bold text-md block mb-10 " style="white-space: pre-wrap">{{ $update->body }}</h1>

    <h1 class="font-bold text-md mt-20 block ">Links:</h1>
    @foreach ($update->url as $link)
        <a style="color:blue;text-decoration:underline;" href="{{ $link->url }}">{{ $link->url  }}</a><br>
    @endforeach
    <div class="flex mt-20 mb-3">
        <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 ml-3"><a href="{{ route('techUpdates.index') }}" class="card-link">Back to Updates</a></button>
            @if(auth()->user()->isAdmin())
                <form method="POST" action="{{ route('techUpdates.delete') }}"> 
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $update->id }}"> 
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 ">Delete Update</button>
                </form>
                <p><button class="bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500 mr-4 ml-3"><a href="{{ route('techUpdates.edit',$update->techname) }}" class="card-link">Edit this Update</a></button>
            @endif
        </p>
    </div>
</div>
@endcomponent