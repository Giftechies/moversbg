@extends('layouts.admin')

@section('content')
    <h1>Orders</h1>
<table class="table table-striped table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Pick Address</th>
            <th scope="col">Drop Address</th>
            <th scope="col">Order Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->pick_address }}</td>
            <td>{{ $order->drop_address }}</td>
            <td>{{ $order->odate }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info me-2">View</a>  
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}
@endsection

