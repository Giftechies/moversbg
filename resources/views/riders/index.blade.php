@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Riders List</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('riders.create') }}" class="btn btn-primary btn1">
                            Add New Rider
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($riders as $rider)
                            <tr>
                                <td>{{ $rider->name }}</td>
                                <td>{{ $rider->email }}</td>
                                <td>{{ $rider->mobile }}</td>

                                <td>
                                    <span class="badge {{ $rider->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $rider->status == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('riders.edit', $rider->id) }}" 
                                       class="btn btn-sm btn-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('riders.destroy', $rider->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure, you want to delete')">
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