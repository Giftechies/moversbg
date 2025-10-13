@extends('layouts.app')

@section('content')
   <h1>Edit Variations</h1>
<form method="POST" action="{{ route('variations.update', $complication->id) }}" class="container mt-5">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="name" class="form-label fw-bold">Name:</label>
        <input type="text" name="name" value="{{ old('name', $complication->name) }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
 <div class="form-group mb-3">
        <label for="name" class="form-label fw-bold">Calculate as Per Meter</label>
        <input type="number" name="meter" value="{{ old('meter',$complication->meter) }}" class="form-control">
        @error('meter')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group mb-3">
        <label for="status" class="form-label fw-bold">Status:</label>
        <select name="status" class="form-select">
            <option value="1" {{ old('status', $complication->status) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $complication->status) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

