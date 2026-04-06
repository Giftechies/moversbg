@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h4 class="card-title heading">Add Driver</h4>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('riders.index') }}" class="btn btn-secondary mb-3">
                            Back
                        </a>
                    </div>
                </div>

                <!-- Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('riders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-1">
                            <label class="lable">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Driving License Number</label>
                            <input type="number" class="form-control" name="driving_license_number" value="{{ old('driving_license_number') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rider Image</label>
                            <input type="file" class="form-control" name="rimg">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Driving License</label>
                            <input type="file" class="form-control" name="driving_license">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">License Expiry Date</label>
                            <input type="date" class="form-control" name="exp_date" value="{{ old('exp_date') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Address</label>
                            <input type="text" class="form-control" name="full_address" value="{{ old('full_address') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="lable">Pincode</label>
                            <input type="number" class="form-control" name="pincode" value="{{ old('pincode') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="lable">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="lable">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="lable">Rider Status</label>
                            <select name="rstatus" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>
                        </div>

                        <!-- Buttons -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn1">
                                Add Driver
                            </button>

                            <a href="{{ route('riders.index') }}" class="btn btn-secondary btn1">
                                Cancel
                            </a>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection