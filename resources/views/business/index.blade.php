@extends('layouts.admin')

@section('content')
    <h4>  Business List</h4>
    <a href="{{ route('business.create') }}" class="btn btn-success mb-2">Add   Business</a>
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
            @foreach($business as $business)
                <tr>
                    <td>{{ $business->id }}</td>
                    <td>{{ $business->name }}</td>
                    <td>{{ $business->email }}</td>
                    {{--<td>{{ $business->zone->title ?? 'N/A' }}</td>--}} 
                    <td>{{ $business->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('business.edit', $business->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('business.destroy', $business->id) }}" method="POST" style="display:inline;">
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