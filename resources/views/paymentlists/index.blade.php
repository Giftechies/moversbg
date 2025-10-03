@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Payment Gateways List</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paymentLists as $paymentList)
                                            <tr>
                                                <td>{{ $paymentList->id }}</td>
                                                <td>{{ $paymentList->title }}</td>
                                                <td>
                                                    @if($paymentList->status == 1)
                                                        <span class="badge badge-success">Publish</span>
                                                    @else
                                                        <span class="badge badge-danger">UnPublish</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('paymentlists.edit', $paymentList->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection