@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                               <h1>Property Types</h1>
                                    <a class="btn btn-success mt-2 mb-2" href="{{ route('property_types.create') }}">Create New</a>
                                   <table class="table table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($propertyTypes as $propertyType)
                                            <tr>
                                                <td>{{ $propertyType->name }}</td>
                                                <td>
                                                    <span class="badge {{ $propertyType->status ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ $propertyType->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('property_types.edit', $propertyType->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                                                    <form action="{{ route('property_types.destroy', $propertyType->id) }}" method="POST" class="d-inline">
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