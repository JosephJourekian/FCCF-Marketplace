@component('components.app')

<h1 class="font-bold text-lg mb-4 block">Purchase History</h1>

<!--<select id="date" name="date" class="form-control">
    @foreach ($order as $orders)
    <option value="{{ $orders->created_at->format('Y-m-d') }}">{{ $orders->created_at->format('Y-m-d') }}</option>
    @endforeach
</select>-->

@foreach ($order as $orders)
<div class="border border-gray-800 rounded-lg">
    <h1 class="font-bold text-md mt-4 block">Purchased on: {{ $orders->created_at->format('Y-m-d') }}</h1>
    <img class="rounded-lg" src="{{ $orders->product_image }}" style="width:150px;height:125px;float:left">
    <a class="font-bold text-md" style="color:blue"href="{{ route('products.show',$orders->product_id) }}">{{ $orders->product_name }}</a>
    <h1 class="font-bold text-md mt-4 block">Quantity: {{ $orders->product_qty }}</h1>
    <h1 class="font-bold text-md mb-4 block">Price: {{ $orders->product_price }} Points</h1>
    <h1 class="font-bold text-md mb-4 block">Subtotal of the order: {{ $orders->order_subtotal }} Points</h1>
</div>
@endforeach
@endcomponent