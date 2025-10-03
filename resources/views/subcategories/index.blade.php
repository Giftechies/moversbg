@extends('layouts.admin')

@section('content')
    <h4>SubCategories List</h4>
    <a href="{{ route('subcategories.create') }}" class="btn btn-success mb-2">Add SubCategory</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->Pcat->title ?? 'N/A' }}</td>
                    <td>{{ $subcategory->title }}</td>
                    <td>{{ $subcategory->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
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
