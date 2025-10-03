@extends('layouts.admin')

@section('content')
    <h4>Country Codes List</h4>
    <a href="{{ route('codes.create') }}" class="btn btn-success mb-2">Add Country Code</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Country Code</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codes as $code)
                <tr>
                    <td>{{ $code->id }}</td>
                    <td>{{ $code->ccode }}</td>
                    <td>{{ $code->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('codes.edit', $code->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('codes.destroy', $code->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection