@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h4 class="card-title heading">Zones List</h4>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('zones.create') }}" class="btn btn-success mb-3">
                            Add Zone
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($zones as $zone)
                            <tr>
                                <td>{{ $zone->id }}</td>

                                <td>{{ $zone->title }}</td>

                                <td>
                                    <span class="badge {{ $zone->status ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $zone->status ? 'Publish' : 'UnPublish' }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('zones.edit', $zone->id) }}" 
                                       class="btn btn-primary btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('zones.destroy', $zone->id) }}" 
                                          method="POST" 
                                          class="d-inline">
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