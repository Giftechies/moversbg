@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Banners List</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">
                            Add New Banner
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
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

                                <td>
                                    <img src="{{ asset($banner->img) }}" 
                                         width="100" 
                                         style="border-radius:8px; object-fit:cover;">
                                </td>

                                <td>
                                    @if($banner->status == 1)
                                        <span class="badge bg-success">Publish</span>
                                    @else
                                        <span class="badge bg-danger">UnPublish</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('banners.edit', $banner->id) }}" 
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('banners.destroy', $banner->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger">
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