@extends('layouts.admin')

@section('content')
    <h4>Edit Business Vehicle</h4>
    <form method="POST" action="{{ route('business_vehicles.update', $businessVehicle->vehicle_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-3">
                <label>Vehicle Number</label>
                <input type="text" class="form-control" name="vehicle_no" value="{{ $businessVehicle->vehicle_no }}" required>
            </div>

            <div class="form-group col-3">
                <label>Model</label>
                <input type="text" class="form-control" name="model" value="{{ $businessVehicle->model }}" required>
            </div>

            <div class="form-group col-3">
                <label>Registration Copy</label>
                <input type="file" class="form-control" name="registration_copy">
                @if($businessVehicle->registration_copy)
                    <a href="{{ asset('storage/' . $businessVehicle->registration_copy) }}" target="_blank">View File</a>
                @endif
            </div>

            <div class="form-group col-3">
                <label>Insurance</label>
                <input type="file" class="form-control" name="insurance">
                @if($businessVehicle->insurance)
                    <a href="{{ asset('storage/' . $businessVehicle->insurance) }}" target="_blank">View File</a>
                @endif
            </div>

            <div class="form-group col-3">
                <label>Attachment 1 Name</label>
                <input type="text" class="form-control" name="attachment1_name" value="{{ $businessVehicle->attachment1_name }}">
            </div>

            <div class="form-group col-3">
                <label>Attachment File</label>
                <input type="file" class="form-control" name="attachment_file">
                @if($businessVehicle->attachment_file)
                    <a href="{{ asset('storage/' . $businessVehicle->attachment_file) }}" target="_blank">View File</a>
                @endif
            </div>

            <div class="form-group col-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $businessVehicle->status == 1 ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $businessVehicle->status == 0 ? 'selected' : '' }}>UnPublish</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-2">Update Vehicle</button>
            </div>
        </div>
    </form>
@endsection
