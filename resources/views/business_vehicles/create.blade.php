@extends('layouts.admin')

@section('content')
    <h4>Add Business Vehicle</h4>
    <form method="POST" action="{{ route('business_vehicles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-3">
                <label>Vehicle Number</label>
                <input type="text" class="form-control" name="vehicle_no" required>
            </div>

            <div class="form-group col-3">
                <label>Model</label>
                <input type="text" class="form-control" name="model" required>
            </div>

            <div class="form-group col-3">
                <label>Registration Copy</label>
                <input type="file" class="form-control" name="registration_copy">
            </div>

            <div class="form-group col-3">
                <label>Insurance</label>
                <input type="file" class="form-control" name="insurance">
            </div>

            <div class="form-group col-3">
                <label>Attachment 1 Name</label>
                <input type="text" class="form-control" name="attachment1_name">
            </div>

            <div class="form-group col-3">
                <label>Attachment File</label>
                <input type="file" class="form-control" name="attachment_file">
            </div>

            <div class="form-group col-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">UnPublish</option>
                </select>
            </div>

            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary mb-2">Add Vehicle</button>
            </div>
        </div>
    </form>
@endsection
