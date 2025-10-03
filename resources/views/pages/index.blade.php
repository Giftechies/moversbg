@extends('layouts.app')

@section('content')
    <h4>Pages List</h4>
    <a href="{{ route('pages.create') }}" class="btn btn-success mb-2">Add Page</a>
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
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->status ? 'Publish' : 'Unpublish' }}</td>
                    <td>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
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