@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Pending Bids</h2>
                    </div>
                </div>

                <!-- Content -->
                @if($pendingBids->isEmpty())
                    <div class="alert alert-info">
                        No pending bids at the moment.
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
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pendingBids as $bid)
                            <tr>
                                <td>{{ $bid->id }}</td>
                                <td>{{ $bid->order_id }}</td>
                                <td>{{ $bid->vendor->name ?? '—' }}</td>
                                <td>{{ $bid->amount }}</td>
                                <td>{{ $bid->comments ?? '—' }}</td>
                                <td>{{ $bid->created_at->format('Y-m-d H:i') }}</td>

                                <td>
                                    <a href="{{ route('orders.show', \App\Helpers\EncryptHelper::enc($bid->order_id)) }}"
                                       class="btn btn-sm btn-primary">
                                        View Order
                                    </a>

                                    <form action="{{ route('bids.approve', $bid) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm btn-success"
                                                onclick="return confirm('Approve this bid?')">
                                            Approve
                                        </button>
                                    </form>
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