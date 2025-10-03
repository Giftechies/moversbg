@extends('layouts.app')

@section('content')
    <h4>Zones List</h4>
    <a href="{{ route('zones.create') }}" class="btn btn-success mb-2">Add Zone</a>
    <table class="table table-bordered">
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
                    <td>{{ $zone->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('zones.edit', $zone->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('zones.destroy', $zone->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

