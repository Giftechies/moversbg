@extends('layouts.admin')

@section('content')
    <h1>Complication Rates</h1>
<a href="{{ route('complication_rates.create') }}" class="btn btn-success mt-2 mb-2">Create New</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Rate</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($complicationRates as $complicationRate)
        <tr>
            <td>{{ $complicationRate->name }}</td>
            <td>{{ $complicationRate->rate}}</td>
            <td>{{ $complicationRate->type }}</td>
            <td>
                <span class="badge {{ $complicationRate->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $complicationRate->status ? 'Active' : 'Inactive' }}
                </span>
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('complication_rates.edit', $complicationRate->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                    <form action="{{ route('complication_rates.destroy', $complicationRate->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

