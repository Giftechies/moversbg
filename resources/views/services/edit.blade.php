@extends('layouts.admin') 
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<div class="container">
    <h2>Edit Service</h2>
 {{-- Show all errors in one place (optional) --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $service->title }}" class="form-control" required>
            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea   id="summernote" name="description" class="form-control">{{ $service->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($service->image)
                <img src="{{ asset($service->image) }}" width="100" height="100" style="object-fit:cover;border-radius:8px;margin-bottom:10px;">
            @else
                <p class="text-muted">No image</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1" {{ isset($service) && $service->status ? 'selected' : '' }}>Active</option>
        <option value="0" {{ isset($service) && !$service->status ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
        });
    });
</script>
@endsection
