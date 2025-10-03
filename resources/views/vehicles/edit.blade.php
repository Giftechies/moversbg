@extends('layouts.app')

@section('content')
    <h4>Edit Vehicle</h4>
   <form method="post" action="{{ route('vehicles.update', $vehicle->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="vtitle">Vehicle Title</label>
        <input type="text" class="form-control" id="vtitle" name="vtitle" value="{{ $vehicle->title }}" required>
    </div>
    <div class="form-group">
        <label for="cat_img">Upload Vehicle Image</label>
        <input type="file" class="form-control" id="cat_img" name="cat_img">
        <img src="{{ asset($vehicle->img) }}" width="100" height="100">
    </div>
    <!-- Add more fields as needed -->
    <button type="submit" class="btn btn-primary">Update Vehicle</button>
</form>
@endsection 