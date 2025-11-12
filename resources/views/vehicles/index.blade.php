@extends('layouts.admin')

@section('content') 
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Vehicles</h4>
        <a href="{{ route('vehicleTypes.create') }}" class="btn btn-primary mb-3">Add New Vehicle</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->title }}</td>
                    <td><img src="{{ asset($vehicle->img) }}" width="50" height="50"></td>
                    <td>{{ $vehicle->status == 1 ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('vehicleTypes.edit', $vehicle->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('vehicleTypes.destroy', $vehicle->id) }}" method="post" style="display: inline-block;">
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

@endsection

