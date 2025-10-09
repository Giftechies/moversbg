@extends('layouts.admin')

@section('content')
  <h1>Create Complication</h1>

<form method="POST" action="{{ route('complications.store') }}" class="container mt-5">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label fw-bold">Pickup Type</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

     <div class="form-group mb-3">
        <label for="name" class="form-label fw-bold">Calculate as Per Meter</label>
        <input type="number" name="meter" value="{{ old('meter') }}" class="form-control">
        @error('meter')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="status" class="form-label fw-bold">Status:</label>
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
@endsection 