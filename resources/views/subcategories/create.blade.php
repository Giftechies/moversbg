@extends('layouts.app')

@section('content') 
    <form method="POST" action="{{ route('subcategories.store') }}">
        @csrf
        <div class="form-group">
            <label>Select Category</label>
            <select name="cat_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Sub Category Name</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add SubCategory</button>
    </form> 
@endsection