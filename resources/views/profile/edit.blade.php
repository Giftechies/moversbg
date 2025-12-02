@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Profile</h2> 
   
        <form method="post" action="{{ route('profileupdate') }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
             <div class="form-group col-6">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $auth->name }}" required>
            </div>
             <div class="form-group col-6">
                <label> Phone</label>
                <input type="text" class="form-control" name="mobile" value="{{ $auth->mobile }}" required>
            </div>
             <div class="form-group col-6">
                <label> Email </label>
                <input type="text" class="form-control" name="email" value="{{ $auth->email }}" required>
            </div> 
            <div class="form-group col-6">
                <label> Business Name</label>
                <input type="text" class="form-control" name="business_name" value="{{ $business->name }}" required>
            </div>
             <div class="form-group col-6">
                <label> ABN Number</label>
                <input type="text" class="form-control" name="business_abn" value="{{ $business->abn }}" required>
            </div>
             <div class="form-group col-6">
                <label> Website</label>
                <input type="text" class="form-control" name="business_website" value="{{ $business->website }}" required>
            </div>
            <div class="form-group col-6">
                <label> Business Image</label>
                <input type="file" class="form-control" name="business_img">
                @if($business->img)
                    <img src="{{ asset('storage/' . $business->img) }}" width="100" alt="business Image">
                @endif
            </div>
           
            <div class="form-group col-6">
                <label>Business Phone</label>
                <input type="text" class="form-control" name="business_mobile" value="{{ $business->mobile }}" required>
            </div>
            <div class="form-group col-6">
                <label>Business Email  </label>
                <input type="email" class="form-control" name="business_email" value="{{ $business->email }}" required>
            </div>
            <div class="form-group col-6">
                <label>Password (leave blank to keep current)</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-6">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $business->address }}</textarea> 
            </div>
            {{--<div class="form-group col-12">
                <label>Select Zone</label>
                <select name="zone_id" class="form-control" required>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}" {{ $business->zone_id == $zone->id ? 'selected' : '' }}>{{ $zone->title }}</option>
                    @endforeach
                </select>
            </div>--}} 
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary mb-2">Update  Business</button>
            </div>
        </div>
    </form>
    </div>
        </div>
    </div>
</div> 
@endsection

