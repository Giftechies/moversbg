@extends('layouts.admin')

@section('content')
    <h4>Add Product</h4>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="cat_id" id="cat_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label>Product Status</label>
            <select name="status" class="form-control">
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form> 
@endsection 