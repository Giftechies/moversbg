@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>Edit Property Type</h1>
                               <form method="POST" action="{{ route('property_types.update', $propertyType->id) }}" class="container mt-5">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" value="{{ old('name', $propertyType->name) }}" class="form-control">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
 <div class="form-group mb-3">
        <label for="name" class="form-label fw-bold">Icon</label>
        <input type="text" name="icon" value="{{ old('icon', $propertyType->icon) }}" class="form-control">
        @error('icon')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        
    </div>


    <div class="form-group">
        <label for="status" class="form-label">Status:</label>
        <select name="status" class="form-select">
            <option value="1" {{ old('status', $propertyType->status) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $propertyType->status) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection