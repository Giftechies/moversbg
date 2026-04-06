@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Approved Bids</h2>
                    </div>
                </div>

                <!-- Content -->
                @if($approvedBids->isEmpty())
                    <div class="alert alert-info">
                        No bids have been approved yet.
                    </div>
                @else

                <table class="table table-bordered align-middle">
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
                                <td>{{ $bid->updated_at->format('Y-m-d H:i') }}</td>

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

            </div>
        </div>
    </div>
</div>
@endsection