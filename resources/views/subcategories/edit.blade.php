@extends('layouts.admin')

@section('content')
    <h4>Edit Sub Category</h4>
    <form method="POST" action="{{ route('subcategories.update', $subcategory->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Select Category</label>
            <select name="cat_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $subcategory->cat_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Sub Category Name</label>
            <input type="text" class="form-control" name="title" value="{{ $subcategory->title }}" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $subcategory->status == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ $subcategory->status == 0 ? 'selected' : '' }}>UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update SubCategory</button>
    </form>
@endsection