@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Categories</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">
                            Add Category
                        </a>
                    </div>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                <img src="{{ asset($category->cat_img) }}" 
                                     width="50" 
                                     class="rounded"
                                     style="object-fit:cover;">
                            </td>

                            <td>{{ $category->cat_name }}</td>

                            <td>
                                <span class="badge {{ $category->cat_status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $category->cat_status ? 'Published' : 'Unpublished' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" 
                                   class="btn btn-sm btn-info me-2">
                                    Edit
                                </a>

                                <form action="{{ route('category.destroy', $category->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection