@extends('layouts.admin')

@section('content')
    <h4>  Managers List</h4>
    <a href="{{ route('managers.create') }}" class="btn btn-success mb-2">Add   Manager</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                {{--<th>Zone</th>--}} 
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($managers as $manager)
                <tr>
                    <td>{{ $manager->id }}</td>
                    <td>{{ $manager->name }}</td>
                    <td>{{ $manager->email }}</td>
                    {{--<td>{{ $manager->zone->title ?? 'N/A' }}</td>--}} 
                    <td>{{ $manager->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" style="display:inline;">
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