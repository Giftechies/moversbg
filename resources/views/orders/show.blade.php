@extends('layouts.admin')

@section('content') 
<h1>Order #{{ $order->id }}</h1>

<table class="table table-striped"> 
    @if(!empty($order->user->name))
        <tr>
            <td>User</td>
            <td>{{ $order->user->name }}</td>
        </tr>
    @endif
    @if(!empty($order->user->email))
        <tr>
            <td>Email</td>
            <td>{{ $order->user->email }}</td>
        </tr>
    @endif
    @if(!empty($order->user->mobile))
        <tr>
            <td>Mobile</td>
            <td>{{ $order->user->mobile }}</td>
        </tr>
    @endif
    @if(!empty($order->delivertime))
        <tr>
            <td>Delivery Time</td>
            <td>{{ $order->delivertime }}</td>
        </tr>
    @endif
    @if(!empty($order->pick_name))
        <tr>
            <td>Pickup Name</td>
            <td>{{ $order->pick_name }}</td>
        </tr>
    @endif
    @if(!empty($order->pick_mobile))
        <tr>
            <td>Pickup Mobile</td>
            <td>{{ $order->pick_mobile }}</td>
        </tr>
    @endif
    @if(!empty($order->property_type))
        <tr>
            <td>Property Type</td>
            <td>{{ $order->property_type }}</td>
        </tr>
    @endif
    @if(!empty($order->place_type))
        <tr>
            <td>Place Type</td>
            <td>{{ $order->place_type }}</td>
        </tr>
    @endif
    @if(!empty($order->storage_unit))
        <tr>
            <td>Storage Unit</td>
            <td>{{ $order->storage_unit }}</td>
        </tr>
    @endif
    @if(!empty($order->facilities_required))
        <tr>
            <td>Facilities Required</td>
            <td>@if($order->facilities_required == 1) Yes @endif </td>
        </tr>
    @endif
    @if(!empty($order->additional_notes))
        <tr>
            <td>Additional Notes</td>
            <td>{{ $order->additional_notes }}</td>
        </tr>
    @endif
    @if(!empty($order->dropPoint->drop_address))
        <tr>
            <td>Drop Point</td>
            <td>{{ $order->dropPoint->drop_address }}</td>
        </tr>
    @endif 
</table>

<h2>Logistics Products</h2>
<table class="table table-striped">
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
    </tr>
    @foreach($order->logisticsProducts as $product)
        @if(!empty($product->product_name) && !empty($product->quantity))
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->quantity }}</td>
            </tr>
        @endif
    @endforeach
</table>
@endsection

