
@component('components.app')
<h1 class="font-bold  mb-4">List of Users</h1>
<div>
    @if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
    @endif
    
    <div>
        <form method="POST" action='{{ route('viewUsers') }}' enctype="multipart/form-data" class="mb-8" >
            @csrf
            @method('PATCH')
            
            <table id="t01">
                <tr>
                  <th>User Name</th>
                  <th>Point Amount</th>
                  <th>Current Type</th>
                  <th>Change Type</th>
                  <th>Point Adjustment</th>
                  <th>View Purchase History</th>
                </tr>
                <?php $index = 0 ?>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->points }}</td>
                  <input hidden type="number" name="users[{{ $index }}][id]" value="{{ $user->id }}" required>
                  <td>{{ $user->type }}</td>
                  <td><select name="users[{{ $index }}][type]" value="{{ $user->type }}">
                    <option></option>
                    <option value="admin">Admin</option>
                    <option value="default">Default</option>
                  </select></td>
                  <td><input type="number" name="users[{{ $index }}][points]" value="" ></td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="{{ route('purchaseHistory',$user->username) }}" class="card-link">Purchase History</a></button></td>
                </tr>
                <?php $index++ ?>
                @endforeach
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
@endcomponent