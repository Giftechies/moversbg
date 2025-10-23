@extends('layouts.admin')

@section('content')
    <h4>Products List</h4>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-2">Add Product</a>
    <table class="table table-bordered">
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
                    
                    <td> <i class="{{ $product->Pcat->icon }}  me-2 "style="color: #3b3c3d;"></i> {{ $product->Pcat->title ?? 'N/A' }}</td> 
                      <!-- <td></td> -->
                    
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection