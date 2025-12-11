@extends('layouts.admin')    

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title mb-4">All Services</h2>  
                    </div>
                    <div class="col-lg-4 top">
                        <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add Service</a>
                    </div>
                </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th><th>Title</th><th>Image</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->title }}</td>
                    <td>
                        @if($service->image)
                            <img src="{{ asset($service->image) }}" width="70" height="70" style="object-fit:cover;border-radius:8px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ $service->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
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



