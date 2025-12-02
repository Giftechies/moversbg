@extends('layouts.admin')

@section('content')

    <h2>Vehicle List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">
        Add New Vehicle
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Reg. No.</th>
                <th>Make / Model</th>
                <th>Year</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vehicles as $vehicle)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vehicle->type->title }}</td>
                    <td>{{ $vehicle->registration_no }}</td>
                    <td>{{ $vehicle->make }} {{ $vehicle->model }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->capacity }} kg</td>
                    <td>
                        <span class="btn btn-sm
                            @if($vehicle->status == 'available')    btn-success
                            @elseif($vehicle->status == 'in-use')   btn-warning
                            @else                                   btn-danger
                            @endif">
                            {{ ucfirst($vehicle->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('vehicle-documents.index', ['id' => $vehicle->id]) }}" class="btn btn-sm btn-warning">Documents</a>
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-info">Edit</a> 
                        <form action="{{ route('vehicles.destroy', $vehicle) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this vehicle?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $vehicles->links() }}   {{-- pagination --}}
</div>
@endsection

