@extends('layouts.admin')

@section('content') 
<h1 class="text-center mb-4">Create Complication Rate</h1>
<form method="POST" action="{{ route('complication_rates.store') }}" class="container mt-5">
    @csrf
    <div class="row mb-3">
      
        <div class="col-md-6">
            <label for="name" class="form-label fw-bold">Number of Bedrooms</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="rate" class="form-label fw-bold">Rate:</label>
            <input type="number" name="rate" value="{{ old('rate') }}" step="0.01" class="form-control">
            @error('rate')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="type" class="form-label fw-bold">Type:</label>
            <input type="text" name="type" value="{{ old('type') }}" class="form-control">
            @error('type')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label fw-bold">Status:</label>
            <select name="status" class="form-select">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection