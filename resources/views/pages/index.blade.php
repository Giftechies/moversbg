@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Pages</h2>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Add New Page</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                    <th>Image</th> 
                <th>Parent</th> 
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                 
                <td>{{ $page->title }}</td> 
                   <td>
                        @if($page->image)
                            <img src="{{ asset($page->image) }}" width="70" height="70" style="object-fit:cover;border-radius:8px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td></td>
                <td>{{ $page->parent ? $page->parentPage->title : '—' }}</td> 
                <td>{{ $page->status ? 'Active' : 'Inactive' }}</td> 
                <td>
                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this page?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection