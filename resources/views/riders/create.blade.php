@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add Driver  </h4>

                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('riders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}" required>
                                </div> 
                                <div class="form-group col-6">
                                    <label>Driving License Number</label>
                                    <input type="number" class="form-control" name="driving_license_number" value="{{old('driving_license_number')}}" placeholder="Driving License Number">
                                </div> 
                                <div class="form-group col-6">
                                    <label>Rider Image</label>
                                    <input type="file" class="form-control" name="rimg">
                                </div> 
                                <div class="form-group col-6">
                                    <label>Driving License</label>
                                    <input type="file" class="form-control" name="driving_license" value="{{old('driving_license')}}">
                                </div> 
                                <div class="form-group col-6">
                                    <label>License Expiry Date</label>
                                    <input type="date" class="form-control" name="exp_date" value="{{old('exp_date')}}" placeholder="License Expiry Date">
                                </div> 
                                <div class="form-group col-6">
                                    <label>Full Address</label>
                                    <input type="text" class="form-control" name="full_address" value="{{old('full_address')}}" placeholder="Full Address">
                                </div>

                                <div class="form-group col-6">
                                    <label>Pincode</label>
                                    <input type="number" class="form-control" name="pincode" value="{{old('pincode')}}" placeholder="Pincode">
                                </div> 
                                <div class="form-group col-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}"  >
                                </div>

                                <div class="form-group col-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>Rider Status</label>
                                    <select name="rstatus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" value="{{old('mobile')}}"  required>
                                </div>
 
                              
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mb-2">Add Driver  </button>
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