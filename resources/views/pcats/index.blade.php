@extends('layouts.admin')

@section('content')
    <h4>Categories List</h4>
    <a href="{{ route('pcats.create') }}" class="btn btn-success mb-2">Add Category</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pcats as $pcat)
                <tr>
                    <td>{{ $pcat->id }}</td>
                    <td>{{ $pcat->title }}</td>
                    <td>{{ $pcat->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('pcats.edit', $pcat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pcats.destroy', $pcat->id) }}" method="POST" style="display:inline;">
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