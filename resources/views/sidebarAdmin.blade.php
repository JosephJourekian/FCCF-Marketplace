<meta name="viewport" content="width=device-width, initial-scale=1">
<ul>
    <!-- -->
    <li>
        <a href="{{ route('home') }}" class="font-bold text-lg mb-4 block">
            Home <!--or use can use /tweets -->
        </a>
    </li>
    <li>
        <p class="font-bold text-lg mb-4 block">
            My points: {{ auth()->user()->points }}
        </p>
    </li>
    <li>
        <a href="{{ route('carts.index') }}" class="font-bold text-lg mb-4 block">
            My Cart ({{ Cart::count() }})
        </a>
    </li>
    <li>
        <a href="{{ route('menuTest') }}" class="font-bold text-lg mb-4 block">
            Frontend Homepage
        </a>
    </li>
    <li>
        <a href="{{ route('productTest') }}" class="font-bold text-lg mb-4 block">
            Frontend Product page
        </a>
    </li>

    <li>
        <div class="dropdown">
            <button class="dropbtn">FCCF Updates</button>
            <div class="dropdown-content">
              <a href="{{ route('fccfUpdates.index') }}">View Updates</a>
              <a href="{{ route('fccfUpdates.add') }}" >Add Update</a>
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown">
            <button class="dropbtn">Tech Updates</button>
            <div class="dropdown-content">
              <a href="{{ route('techUpdates.index') }}">View Updates</a>
              <a href="{{ route('techUpdates.add') }}" >Add Update</a>
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown">
            <button class="dropbtn">Products</button>
            <div class="dropdown-content">
              <a href="{{ route('products.index') }}">View Products</a>
              <a href="{{ route('products.add') }}" >Add Products</a>
              <a href="{{ route('products.inventory.view') }}">Edit Inventory</a>
              <a href="{{ route('products.attributes') }}">Edit Attributes</a>
            </div>
        </div>
    </li>
    
    <li>
        <div class="dropdown">
            <button class="dropbtn">My Profile</button>
            <div class="dropdown-content">
                <a href="{{ route('profiles.edit',auth()->user()->username) }}">Edit Profile</a>
                <a href="{{route('purchaseHistory',auth()->user()->username) }}">Purchase History</a>
                <a href="{{ route('viewUsers') }}">View Users</a>            
            </div>
        </div>
    </li>
    <li>
        <form method="POST" action="/logout">
            @csrf
            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>