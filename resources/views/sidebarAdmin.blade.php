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
        <a href="{{ route('products.index') }}" class="font-bold text-lg mb-4 block">
            Products
        </a>
        <ul style="margin: 5 0 15 20; list-style-type:circle;">
            <li>
                <a href="{{ route('products.add') }}" >
                    Add Products
                </a>
            </li>
            <li>
                <a href="{{ route('products.remove') }}">
                    Remove Products
                </a>
            </li>
        </ul>
    </li>
    
    <li>
        <a href="{{ route('products.stock') }}" class="font-bold text-lg mb-4 block">
            Edit Inventory
        </a>
    </li>
    <li>
        <a href="{{ route('profiles.edit',auth()->user()->id) }}" class="font-bold text-lg mb-4 block">
            Edit Profile
        </a>
    </li>
    <li>
        <a href="{{route('purchaseHistory',auth()->user()->id) }}" class="font-bold text-lg mb-4 block">
            Purchase History
        </a>
    </li>
    <li>
        <a href="{{ route('viewUsers') }}" class="font-bold text-lg mb-4 block">
            View Users
        </a>
    </li>
    <li>
        <form method="POST" action="/logout">
            @csrf
            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>