@extends('layouts.admin')

@section('content')
    <h4>  Business List</h4>
    <a href="{{ route('business.create') }}" class="btn btn-success mb-2">Add   Business</a>
    <div class="row mb-3">
<div class="col-md-12">
    <form action="{{ route('business.index') }}" method="GET">
        <div class="input-group">
            <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Search business...">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> Search
            </button>
        </div>
    </form>
</div>

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
        @foreach($business as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                {{--<td>{{ $item->zone->title ?? 'N/A' }}</td>--}}
                <td>{{ $item->status ? 'Publish' : 'UnPublish' }}</td>
                <td>
                    <a href="{{ route('business.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('business.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $business->appends(['search' => request('search')])->links() }}


@endsection