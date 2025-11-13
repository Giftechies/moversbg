@extends('layouts.pages') 

@section('content') 
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

        {{-- Title --}}
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-control" required>
            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label>Description</label>
            <textarea id="summernote" name="description" class="form-control">{{ old('description', $service->description) }}</textarea>
            @error('description') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        {{-- Summary --}}
        <div class="mb-3">
            <label>Summary</label>
            <input type="text" name="summary" class="form-control" value="{{ old('summary', $service->summary) }}">
            @error('summary') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        {{-- Current Image --}}
        <div class="mb-3">
            <label>Current Image</label><br>
            @if($service->image)
                <img src="{{ asset($service->image) }}" width="100" height="100" style="object-fit:cover;border-radius:8px;margin-bottom:10px;">
            @else
                <p class="text-muted">No image</p>
            @endif
        </div>

        {{-- Upload New Image --}}
        <div class="mb-3">
            <label>Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div> 
@endsection
