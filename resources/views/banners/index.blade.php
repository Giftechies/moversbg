@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Banners List</h4>
                                <a href="{{ route('banners.create') }}" class="btn btn-primary mb-2">Add New Banner</a>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $banner)
                                            <tr>
                                                <td>{{ $banner->id }}</td>
                                                <td><img src="{{ asset($banner->img) }}" width="100px"></td>
                                                <td>
                                                    @if($banner->status == 1)
                                                        <span class="badge badge-success">Publish</span>
                                                    @else
                                                        <span class="badge badge-danger">UnPublish</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('banners.destroy', $banner->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
            </div>
        </div>
    </div>
@endsection