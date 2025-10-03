@extends('layouts.admin')

@section('content')
    <h4>Add Category</h4>
    <form method="POST" action="{{ route('pcats.store') }}">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <select name="status" class="form-control">
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection