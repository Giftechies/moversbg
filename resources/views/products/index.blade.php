@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Products List</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn1">
                            Add Product
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>

                                <td>
                                    <i class="{{ $product->Pcat->icon }} me-2" style="color: #3b3c3d;"></i>
                                    {{ $product->Pcat->title ?? 'N/A' }}
                                </td>

                                <td>{{ $product->price }}</td>

                                <td>{{ $product->status ? 'Publish' : 'UnPublish' }}</td>

                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection