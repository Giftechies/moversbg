@extends('layouts.admin')

@section('content')
    <h1>Orders</h1>
<h1>Order #{{ $order->id }}</h1>

<p>User: {{ $order->user->name }}</p>
<p>Drop Point: {{ $order->dropPoint->address }}</p>

<h2>Logistics Products</h2>

<ul>
    @foreach($order->logisticsProducts as $product)
        <li>{{ $product->name }} ({{ $product->quantity }})</li>
    @endforeach
</ul>
@endsection

