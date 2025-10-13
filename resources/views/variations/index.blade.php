@extends('layouts.admin')

@section('content')
    <h1>Variations</h1>

<a href="{{ route('variations.create') }}" class="btn btn-success mt-2 mb-2">Create New</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($complications as $complication)
        <tr>
            <td>{{ $complication->name }}</td>
            <td>{{$complication->meter}}</td>
            <td>
                <span class="badge {{ $complication->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $complication->status ? 'Active' : 'Inactive' }}
                </span>
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('variations.edit', $complication->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                    <form action="{{ route('variations.destroy', $complication->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

