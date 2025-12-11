@extends('layouts.admin')

@section('content')
    <h1>Pending Bids</h1>
 <h1>Approved Bids</h1>

    @if($approvedBids->isEmpty())
        <p>No bids have been approved yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Vendor</th>
                    <th>Amount</th>
                    <th>Comment</th>
                    <th>Approved</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvedBids as $bid)
                    <tr>
                        <td>{{ $bid->id }}</td>
                        <td>{{ $bid->order_id }}</td>
                        <td>{{ $bid->vendor->name ?? '—' }}</td>
                        <td>{{ $bid->amount }}</td>
                        <td>{{ $bid->comments ?? '—' }}</td>
                        <td>{{ $bid->updated_at->format('Y‑m‑d H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.show', \App\Helpers\EncryptHelper::enc($bid->order_id)) }}"
                               class="btn btn-sm btn-primary">
                                View Order
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
     @endif
@endsection 
