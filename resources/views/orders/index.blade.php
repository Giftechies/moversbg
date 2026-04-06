@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header Row -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Orders</h2>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <form action="{{ route('orders') }}" method="GET">
                            <div class="input-group">
                                <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Search orders...">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Orders Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Pick Address</th>
                            <th>Drop Address</th>
                            <th>Order Date</th>
                            <th>Actions</th>
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
                                    <a href="{{ route('orders.show', \App\Helpers\EncryptHelper::enc($order->id)) }}" 
                                       class="btn btn-sm ps-2 pe-2 btn-info">
                                       View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $orders->appends(['search' => $search])->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection