@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Extra Charges</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('extra-charges.create') }}" class="btn btn-primary mb-3">
                            Add New
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($charges as $charge)
                        <tr>
                            <td>{{ $charge->name }}</td>

                            <td>{{ ucfirst($charge->type) }}</td>

                            <td>
                                {{ $charge->type == 'percent' ? $charge->value.'%' : '$'.$charge->value }}
                            </td>

                            <td>
                                <span class="badge {{ $charge->is_enabled ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $charge->is_enabled ? 'Enabled' : 'Disabled' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('extra-charges.edit', $charge) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('extra-charges.toggle', $charge) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf 
                                    @method('PATCH')
                                    <button class="btn btn-info btn-sm">Toggle</button>
                                </form>

                                <form action="{{ route('extra-charges.destroy', $charge) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this charge?')">
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