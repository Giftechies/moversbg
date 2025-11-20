@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Driver</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('riders.update', $rider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $rider->name) }}" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>Driving License Number</label>
                                    <input type="text" class="form-control" name="driving_license_number"
                                        value="{{ old('driving_license_number', $rider->lcode) }}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Rider Image</label>
                                    <input type="file" class="form-control" name="rimg">
                                    @if($rider->rimg)
                                        <small class="form-text text-muted">
                                            Current: <a href="{{ asset($rider->rimg) }}" target="_blank">View</a>
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group col-6">
                                    <label>Driving License</label>
                                    <input type="file" class="form-control" name="driving_license">
                                    @if($rider->dl)
                                        <small class="form-text text-muted">
                                            Current: <a href="{{ asset($rider->dl) }}" target="_blank">View</a>
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group col-6">
                                    <label>License Expiry Date</label>
                                    <input type="date" class="form-control" name="exp_date"
                                        value="{{ old('exp_date', $rider->dl_exp_date) }}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Full Address</label>
                                    <input type="text" class="form-control" name="full_address"
                                        value="{{ old('full_address', $rider->full_address) }}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Pincode</label>
                                    <input type="text" class="form-control" name="pincode"
                                        value="{{ old('pincode', $rider->pincode) }}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $rider->email) }}" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Leave blank to keep current password">
                                </div>

                                <div class="form-group col-6">
                                    <label>Rider Status</label>
                                    <select name="rstatus" class="form-control">
                                        <option value="1" {{ old('rstatus', $rider->rstatus) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('rstatus', $rider->rstatus) == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="mobile"
                                        value="{{ old('mobile', $rider->mobile) }}" required>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mb-2">Update Driver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
