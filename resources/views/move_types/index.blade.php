@extends('layouts.admin')

@section('content')
<h1>Move Types</h1>

<a href="{{ route('move_types.create') }}" class="btn btn-success  mt-2 mb-2">Create New</a>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($moveTypes as $moveType)
        <tr>
            <td>{{ $moveType->name }}</td>
            <td>
                <span class="badge {{ $moveType->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $moveType->status ? 'Active' : 'Inactive' }}
                </span>
            </td>
            <td>
                <a href="{{ route('move_types.edit', $moveType->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                <form action="{{ route('move_types.destroy', $moveType->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

