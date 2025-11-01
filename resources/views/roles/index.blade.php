@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Roles & Permissions</h2>

    <div class="row">
        <div class="col-md-6">
            <h4>Add Role</h4>
            <form action="{{ route('roles.store') }}" method="POST">@csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Role name">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>

            <h4>Add Permission</h4>
            <form action="{{ route('permissions.store') }}" method="POST">@csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Permission name">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Assign Permissions to Roles</h4>
            @foreach($roles as $role)
                <div class="card mb-3">
                    <div class="card-header">{{ $role->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('roles.assign', $role->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                @foreach($permissions as $perm)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"
                                            class="form-check-input"
                                            {{ $role->permissions->contains($perm) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $perm->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn btn-sm btn-primary mt-2">Save</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
