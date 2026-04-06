@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Vehicles</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('vehicleTypes.create') }}" class="btn btn-primary mb-3">
                            Add New Vehicle
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
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

                            <td>
                                <img src="{{ asset($vehicle->img) }}" 
                                     width="50" height="50"
                                     style="object-fit:cover; border-radius:6px;">
                            </td>

                            <td>
                                <span class="badge {{ $vehicle->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $vehicle->status == 1 ? 'Publish' : 'UnPublish' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('vehicleTypes.edit', $vehicle->id) }}" 
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('vehicleTypes.destroy', $vehicle->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
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