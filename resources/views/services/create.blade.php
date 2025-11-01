@extends('layouts.pages')  

@section('content') 
<div class="container">
    <h2>Add New Service</h2>
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
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea  id="summernote" name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div> 
@endsection 
