<ul>
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
        <a href="{{ route('products.index') }}" class="font-bold text-lg mb-4 block">
            Products
        </a>
    </li>
    <li>
        <div class="dropdown">
            <button class="dropbtn">My Profile</button>
            <div class="dropdown-content">
                <a href="{{ route('profiles.edit',auth()->user()->username) }}">Edit Profile</a>
                <a href="{{route('purchaseHistory',auth()->user()->username) }}">Purchase History</a>         
            </div>
    </li>
    <li>
        <form method="POST" action="/logout">
            @csrf
            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>