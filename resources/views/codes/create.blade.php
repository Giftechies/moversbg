@extends('layouts.admin')

@section('content')
    <h4>Add Country Code</h4>
    <form method="POST" action="{{ route('codes.store') }}">
        @csrf
        <div class="form-group">
            <label>Country Code</label>
            <input type="text" class="form-control" name="ccode" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Country Code</button>
    </form>
@endsection