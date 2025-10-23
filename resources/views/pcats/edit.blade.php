@extends('layouts.admin')

@section('content')
    <h4>Edit Category</h4>
    <form method="POST" action="{{ route('pcats.update', $pcat->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="title" value="{{ $pcat->title }}" required>
        </div>
          <div class="form-group">
            <label>Icon</label>
            <input type="text" class="form-control" name="icon"  value="{{ $pcat->icon }}"  required>
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $pcat->status == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ $pcat->status == 0 ? 'selected' : '' }}>UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection