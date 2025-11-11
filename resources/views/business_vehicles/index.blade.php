@extends('layouts.admin')

@section('content')
    <h4>Business Vehicle List</h4>
    <a href="{{ route('business_vehicles.create') }}" class="btn btn-success mb-2">Add Vehicle</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehicle Number</th>
                <th>Model</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->vehicle_id }}</td>
                    <td>{{ $vehicle->vehicle_no }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('business_vehicles.edit', $vehicle->vehicle_id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('business_vehicles.destroy', $vehicle->vehicle_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
