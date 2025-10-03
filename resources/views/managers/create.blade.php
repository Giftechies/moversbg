@extends('layouts.admin')

@section('content')
    <h4>Add Zone Manager</h4>
    <form method="POST" action="{{ route('managers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-3">
                <label>Zone Manager Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group col-3">
                <label>Zone Manager Image</label>
                <input type="file" class="form-control" name="img">
            </div>
            <div class="form-group col-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">UnPublish</option>
                </select>
            </div>
            <div class="form-group col-3">
                <label>Mobile number</label>
                <input type="text" class="form-control" name="mobile" required>
            </div>
            <div class="form-group col-6">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group col-6">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group col-12">
                <label>Select Zone</label>
                <select name="zone_id" class="form-control" required>
                    <option value="">Select Zone</option>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-2">Add Zone Manager</button>
            </div>
        </div>
    </form>
@endsection