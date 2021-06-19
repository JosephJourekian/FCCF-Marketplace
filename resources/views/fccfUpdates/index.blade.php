@component('components.app')

<h1 class="font-bold text-lg mb-4 block">FCCF Updates</h1>

@forelse ($updates as $update)
    <div class="border border-gray-800 rounded-lg mb-2">
        <img class="rounded-lg mb-4" src="storage/{{ $update->image}}" style="width:350px;height:200px;float:left">
        <h1 class="font-bold text-md mt-1 block">Posted on: {{ $update->created_at->format('Y-m-d')}}</h1>
        <h1 class="font-bold text-md block">{{ $update->title }}</h1>
        <h1 class="font-bold text-md block">By: {{ $update->author }}</h1>              
        <h1 class="font-bold text-md block mb-12">{{ $update->excerpt }}</h1>
        <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="{{ route('fccfUpdates.show',$update->updatename) }}" class="card-link">View Update</a></button></p>
        @if(auth()->user()->isAdmin())
            <form method="POST" action="{{ route('fccfUpdates.delete') }}"> 
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $update->id }}"> 
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="bg-red-400 text-white rounded py-4 px-6 hover:bg-red-500 mr-4">Delete Update</button>
            </form>
        @endif
        @empty
            <p>No Updates yet!</p>
        
    </div>
    @endforelse
@endcomponent