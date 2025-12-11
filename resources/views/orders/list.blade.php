@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>{{ $title }}</h2>

    @if($orders->isEmpty())
        <p class="text-muted">No orders found.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->code ?? $order->id }}</td>
                        <td>{{ $order->from_date ? date('d‑m‑Y', strtotime($order->from_date)) : '-' }}</td>
                        <td>{{ $order->o_status }}</td>
                        <td>{{ number_format($order->o_total,2) }}</td>
                        <td>
                            <a href="{{ route('orders.show',  \App\Helpers\EncryptHelper::enc($order->id)) }}"
                               class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
