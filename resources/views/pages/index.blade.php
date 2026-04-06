@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Pages</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('pages.create') }}" class="btn btn-primary btn1">Add New Page</a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
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

                            <!-- (kept exactly as your logic, just removed empty td bug) -->
                            <td>{{ $page->parent ? $page->parentPage->title : '—' }}</td>

                            <td>{{ $page->status ? 'Active' : 'Inactive' }}</td>

                            <td>
                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this page?')">
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