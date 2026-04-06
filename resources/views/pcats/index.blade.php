@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Categories List</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('pcats.create') }}" class="btn btn-primary mb-3">
                            Add Category
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pcats as $pcat)
                            <tr>
                                <td>{{ $pcat->id }}</td>
                                <td>{{ $pcat->title }}</td>
                                <td>{{ $pcat->icon }}</td>
                                <td>{{ $pcat->status ? 'Publish' : 'UnPublish' }}</td>
                                <td>
                                    <a href="{{ route('pcats.edit', $pcat->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('pcats.destroy', $pcat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
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