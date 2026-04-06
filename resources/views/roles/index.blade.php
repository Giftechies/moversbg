@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="page-content"> 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Manage Roles & Permissions</h2> 

    <div class="row">
        <div class="col-md-6">
            <h4 class="mb-2 ms-2">Add Role</h4>
            <form action="{{ route('roles.store') }}" method="POST">@csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Role name">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form> 
        </div>
        <div class="col-md-6">

            <h4 class="mb-2 ms-2">Add Permission</h4>
            <form action="{{ route('permissions.store') }}" method="POST">@csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Permission name">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <h4 class="pb-4">Assign Permissions to Roles</h4>
           @foreach($roles as $role)
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ $role->name }}</span>

            <!-- Select All Checkbox -->
            <div>
                <input type="checkbox" class="select-all" data-role="{{ $role->id }}">
                <label>Select All</label>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('roles.assign', $role->id) }}" method="POST">
                @csrf
                <div class="form-group">

                    @foreach($permissions as $perm)
                        <div class="form-check form-check-inline">
                            <input type="checkbox"
                                   name="permissions[]"
                                   value="{{ $perm->name }}"
                                   class="form-check-input role-{{ $role->id }}"
                                   {{ $role->permissions->contains($perm) ? 'checked' : '' }}>

                            <label class="form-check-label">{{ $perm->name }}</label>
                        </div>
                    @endforeach

                </div>

                <button class="btn btn-sm btn-success btn1 ">Save</button>
            </form>
        </div>
    </div>
@endforeach
        </div>
    </div>
</div>
</div>
        </div>
    </div>
</div> 
</div>
</div> 
<style>
    .form-check-inline {
        display: inline-block;
        margin-right: 1rem;
        width: 240px;
    }
</style>
<script>
document.querySelectorAll('.select-all').forEach(function(selectAllCheckbox) {

    selectAllCheckbox.addEventListener('change', function() {
        let roleId = this.getAttribute('data-role');
        let checkboxes = document.querySelectorAll('.role-' + roleId);

        checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

});
</script>
@endsection
