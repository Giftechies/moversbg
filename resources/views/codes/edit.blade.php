@extends('layouts.admin')

@section('content')
    <h4>Edit Country Code</h4>
    <form method="POST" action="{{ route('codes.update', $code->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Country Code</label>
            <input type="text" class="form-control" name="ccode" value="{{ $code->ccode }}" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $code->status == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ $code->status == 0 ? 'selected' : '' }}>UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Country Code</button>
    </form>
@endsection