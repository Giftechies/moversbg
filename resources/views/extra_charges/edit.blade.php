@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Edit Extra Charge</h3>
{{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('extra-charges.update', $extraCharge) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $extraCharge->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="fixed" {{ $extraCharge->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                <option value="percent" {{ $extraCharge->type == 'percent' ? 'selected' : '' }}>Percent</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Value</label>
            <input type="number" step="0.01" name="value" value="{{ $extraCharge->value }}" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_enabled" class="form-check-input" id="is_enabled" value="1"
                {{ $extraCharge->is_enabled ? 'checked' : '' }}>
            <label class="form-check-label" for="is_enabled">Enabled</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('extra-charges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
