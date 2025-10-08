@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>Create Property Type</h1>
                               <form method="POST" action="{{ route('property_types.store') }}" class="container mt-5">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label fw-bold">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        
    </div>
    <!-- <div>
        <i class="fa-solid fa-user"></i>
<i class="fa-regular fa-envelope"></i>
<i class="fa-brands fa-github"></i>

    </div> -->
    <div class="form-group mb-3">
        <label for="status" class="form-label fw-bold">Status:</label>
        <select name="status" class="form-select">
            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection