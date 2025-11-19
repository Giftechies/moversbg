@extends('layouts.admin')

@section('content')
    <h4>Edit Vehicle</h4>
   <form method="post" action="{{ route('vehicleTypes.update', $vehicle->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="form-group">
            <label for="a2" class="il-gray fs-14 fw-500 align-center"><span class="text-danger">*</span> Vehicle Title</label>
            <input type="text" name="vtitle" class="form-control" placeholder="Enter Vehicle Title" value="{{ old('vtitle', $vehicle->title) }}" required>
        </div>
        <div class="form-group">
            <label for="a2" class="il-gray fs-14 fw-500 align-center"> Upload Vehicle Image</label>
            <input type="file" name="cat_img" class="form-control">
            <img src="{{ asset($vehicle->img) }}" width="100" height="100">
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Base Delivery Distance</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Base Delivery Distance" id="ukms" name="ukms" value="{{ old('ukms', $vehicle->ukms) }}" style="" required="required">
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Base Delivery Charge</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Base Delivery Charge" id="uprice" name="uprice" value="{{ old('uprice', $vehicle->uprice) }}" style="" required="required">
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Extra Delivery Charge</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Extra Delivery Charge" id="aprice" name="aprice" value="{{ old('aprice', $vehicle->aprice) }}" style="" required="required">
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Time Taken 1 Km Approx</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Time Taken 1 Km Approx(Mintues)" id="ttime" name="ttime" value="{{ old('ttime', $vehicle->ttime) }}" style="" required="required">
        </div>
        <div class="form-group col-4">
            <label for="a2" class="il-gray fs-14 fw-500 align-center"><span class="text-danger">*</span> Vehicle Status</label>
            <select name="status" class="form-control" required>
                <option value="">Select Status</option>
                <option value="1" {{ old('status', $vehicle->status) == '1' ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ old('status', $vehicle->status) == '0' ? 'selected' : '' }}>UnPublish</option>
            </select>
        </div>
        <div class="form-group col-4">
            <label id="no2" style=""><span class="text-danger">*</span> Vehicle Capacity</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Vehicle Capacity In Kg" id="capcity" name="capcity" value="{{ old('capcity', $vehicle->capcity) }}" style="" required="required">
        </div>
        <div class="form-group col-4">
            <label id="no2" style=""><span class="text-danger">*</span> Vehicle Size</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Vehicle Size" id="size" name="size" value="{{ old('size', $vehicle->size) }}" style="" required="required">
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <div class="form-group">
                <label for="cname"><span class="text-danger">*</span> Vehicle Description </label>
                <textarea class="form-control" rows="5" id="cdesc" name="cdesc" style="resize: none;" required="required">{{ old('cdesc', $vehicle->description) }}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group mb-0">
        <button type="submit" name="add_ban" class="btn btn-primary w-md">Update Vehicle</button>
    </div>
</form>
@endsection 