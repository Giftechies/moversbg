@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Edit  Business</h2> 
 
    <form method="POST" action="{{ route('business.update', $business->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-6">
                <label> Business Name</label>
                <input type="text" class="form-control" name="name" value="{{ $business->name }}" required>
            </div>
            <div class="form-group col-6">
                <label> Business Image</label>
                <input type="file" class="form-control" name="img">
                @if($business->img)
                    <img src="{{ asset('storage/' . $business->img) }}" width="100" alt="business Image">
                @endif
            </div>
            <div class="form-group col-6">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $business->status == 1 ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $business->status == 0 ? 'selected' : '' }}>UnPublish</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label>Mobile number</label>
                <input type="text" class="form-control" name="mobile" value="{{ $business->mobile }}" required>
            </div>
            <div class="form-group col-6">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ $business->email }}" required>
            </div>
            <div class="form-group col-6">
                <label>Password (leave blank to keep current)</label>
                <input type="password" class="form-control" name="password">
            </div>
            {{--<div class="form-group col-12">
                <label>Select Zone</label>
                <select name="zone_id" class="form-control" required>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}" {{ $business->zone_id == $zone->id ? 'selected' : '' }}>{{ $zone->title }}</option>
                    @endforeach
                </select>
            </div>--}} 
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-2">Update  Business</button>
            </div>
        </div>
    </form>
     </div>
        </div>
    </div>
</div>
@endsection

