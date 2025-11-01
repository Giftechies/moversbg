@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>Add Extra Charge</h3>
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
    <form action="{{ route('extra-charges.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="fixed">Fixed</option>
                <option value="percent">Percent</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Value</label>
            <input type="number" step="0.01" name="value" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_enabled" class="form-check-input" id="is_enabled" value="1" checked>
            <label class="form-check-label" for="is_enabled">Enabled</label>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('extra-charges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
