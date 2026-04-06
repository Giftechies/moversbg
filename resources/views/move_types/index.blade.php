@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Move Types</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('move_types.create') }}" class="btn btn-primary mb-3">
                            Create New
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($moveTypes as $moveType)
                        <tr>
                            <td>{{ $moveType->name }}</td>

                            <td>
                                <span class="badge {{ $moveType->status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $moveType->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('move_types.edit', $moveType->id) }}" 
                                   class="btn btn-sm btn-warning me-2">
                                    Edit
                                </a>

                                <form action="{{ route('move_types.destroy', $moveType->id) }}" 
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