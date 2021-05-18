@component('components.app')
<div class="border border-gray-300 rounded-lg">
    @if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="border border-gray-100 rounded-lg">
        <form method="POST" action='/viewUsers' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('PATCH')
            <h4 class="font-bold">Add/Remove points:</h4>
            
            <select id="name" name="name" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <input type="number" id="num" name="num" placeholder="0" required>
            <input type="submit" value="Add" name="add" id="add">
            <input type="submit" value="Subtract" name="sub">
        </form>
        <form method="POST" action='/viewUsers' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('PATCH')
            <h4 class="font-bold">Make a User an admin or default:</h4>
            <select id="name" name="name" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <select id="type" name="type">
                <option value="admin">admin</option>
                <option value="default">default</option>
            </select>
            <input type="submit" value="Submit">
        </form>
        @foreach ($users as $user)
            <div class="flex items-center mb-5">
                <h4 class="font-bold">
                    <pre>{{ $user->name }}</pre>
                    <pre>ID: {{ $user->id }}</pre>
                    <pre>Points:{{ $user->points }}</pre>
                    <pre>Type: {{ $user->type }}</pre>
                    <a href="{{ route('purchaseHistory',$user->id) }}">Purchase history</a>
                </h4>
            </div>
        @endforeach
    </div>
</div>
@endcomponent