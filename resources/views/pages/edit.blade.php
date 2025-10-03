@extends('layouts.app')

@section('content')
    <h4>Edit Page</h4>
    <form method="POST" action="{{ route('pages.update', $page->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label>Page Title</label>
                <input type="text" class="form-control" name="title" value="{{ $page->title }}" required>
            </div>
            <div class="form-group col-md-6">
                <label>Page Status</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ $page->status == 1 ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $page->status == 0 ? 'selected' : '' }}>Unpublish</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label>Page Description</label>
                <textarea class="form-control" name="description" required>{{ $page->description }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Page</button>
    </form>
@endsection
