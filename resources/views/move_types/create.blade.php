@extends('layouts.admin')

@section('content')
<div class="container mt-5">
 
    
    <form method="POST" action="{{ route('move_types.store') }}">
        @csrf

       

<div class="row mb-3">

    <div class="col-md-6">
        <label for="name" class="form-label fw-bold">Move Type Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="icon" class="form-label fw-bold">Icon</label>
        <input type="text" name="icon" value="{{ old('icon') }}" class="form-control">
        @error('icon')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<!-- <div class="row mb-3">

    <div class="col-md-6">
        <label for="name" class="form-label fw-bold">Move Type Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="icon" class="form-label fw-bold">Icon</label>
        <input type="text" name="icon" value="{{ old('icon') }}" class="form-control">
        @error('icon')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-3">

    <div class="col-md-6">
        <label for="name" class="form-label fw-bold">Move Type Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="icon" class="form-label fw-bold">Icon</label>
        <input type="text" name="icon" value="{{ old('icon') }}" class="form-control">
        @error('icon')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-3">

    <div class="col-md-6">
        <label for="name" class="form-label fw-bold">Move Type Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="icon" class="form-label fw-bold">Icon</label>
        <input type="text" name="icon" value="{{ old('icon') }}" class="form-control">
        @error('icon')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div> -->


        <div class="form-group mb-3">
            <label for="status" class="form-label fw-bold">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection

