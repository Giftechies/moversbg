@extends('layouts.admin')

@section('content')
 
<!-- start page title -->
<form method="post" action="{{ route('vehicles.store') }}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="row">
        <div class="form-group">
            <label for="a2" class="il-gray fs-14 fw-500 align-center"><span class="text-danger">*</span> Vehicle Title</label>
            <input type="text" name="vtitle" class="form-control" placeholder="Enter Vehicle Title" value="{{ old('vtitle') }}" required>
            @error('vtitle')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="a2" class="il-gray fs-14 fw-500 align-center"><span class="text-danger">*</span> Upload Vehicle Image</label>
            <input type="file" name="cat_img" class="form-control" required>
            @error('cat_img')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Base Delivery Distance</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Base Delivery Distance" id="ukms" name="ukms" value="{{ old('ukms') }}" style="" required="required">
            @error('ukms')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Base Delivery Charge</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Base Delivery Charge" id="uprice" name="uprice" value="{{ old('uprice') }}" style="" required="required">
            @error('uprice')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Extra Delivery Charge</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Extra Delivery Charge" id="aprice" name="aprice" value="{{ old('aprice') }}" style="" required="required">
            @error('aprice')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-3">
            <label id="no2" style=""><span class="text-danger">*</span> Time Taken 1 Km Approx</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Time Taken 1 Km Approx(Mintues)" id="ttime" name="ttime" value="{{ old('ttime') }}" style="" required="required">
            @error('ttime')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-4">
            <label for="a2" class="il-gray fs-14 fw-500 align-center"><span class="text-danger">*</span> Vehicle Status</label>
            <select name="status" class="form-control" required>
                <option value="">Select Status</option>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>UnPublish</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-4">
            <label id="no2" style=""><span class="text-danger">*</span> Vehicle Capacity</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Vehicle Capacity In Kg" id="capcity" name="capcity" value="{{ old('capcity') }}" style="" required="required">
            @error('capcity')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-4">
            <label id="no2" style=""><span class="text-danger">*</span> Vehicle Size</label>
            <input type="text" class="form-control numberonly" placeholder="Enter Vehicle Size" id="size" name="size" value="{{ old('size') }}" style="" required="required">
            @error('size')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <div class="form-group">
                <label for="cname"><span class="text-danger">*</span> Vehicle Description </label>
                <textarea class="form-control" rows="5" id="cdesc" name="cdesc" style="resize: none;" required="required">{{ old('cdesc') }}</textarea>
                @error('cdesc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group mb-0">
        <button type="submit" name="add_ban" class="btn btn-primary w-md">Add Vehicle</button>
    </div>
</form>
@endsection 