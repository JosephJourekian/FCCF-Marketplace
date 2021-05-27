@component('components.app')

<h1 class="font-bold text-lg mb-4 block">Purchase History</h1>

@foreach ($orders as $order)
    <div class="border border-gray-800 rounded-lg mb-2">
        <h1 class="font-bold text-md mt-4 block">Purchased on: {{ $order->created_at->format('Y-m-d')}}</h1>
        @foreach(unserialize($order['cart']) as $item)
            <img class="rounded-lg mb-4" src="{{ $item->options->img }}" style="width:150px;height:104px;float:left">
            <a class="font-bold text-md mb-3" style="color:blue"href="{{ route('products.show',$item->productname) }}">{{ $item->name}}</a>
            <h1 class="font-bold text-md mt-6 block">Quantity: {{ $item->qty }}</h1>
            <h1 class="font-bold text-md mb-6 block">Price: {{ $item->price }} Points</h1>
        @endforeach
        <h1 class="font-bold text-md mb-6 block">Subtotal of the order: {{ $order->order_subtotal }} Points</h1>
    </div>
@endforeach
@endcomponent