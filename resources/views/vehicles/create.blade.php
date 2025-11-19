@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Vehicle</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('vehicles.store') }}">
        @csrf

       <div class="form-group">
    <label>Vehicle Type</label>
    <select name="type_id" class="form-control" required>
        <option value="">-- Choose Type --</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}"
                {{ old('type_id') == $type->id ? 'selected' : '' }}>
                {{ $type->title }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Registration No.</label>
    <input type="text" name="registration_no" class="form-control" value="{{ old('registration_no') }}" required>
</div>

<div class="form-group">
    <label>Make</label>
    <input type="text" name="make" class="form-control" value="{{ old('make') }}" required>
</div>

<div class="form-group">
    <label>Model</label>
    <input type="text" name="model" class="form-control" value="{{ old('model') }}" required>
</div>

<div class="form-group">
    <label>Year</label>
    <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        @foreach(['available','in-use','maintenance'] as $status)
            <option value="{{ $status }}"
                {{ old('status') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-primary">Save Vehicle</button>
    </form>
</div>
@endsection