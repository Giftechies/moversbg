@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="vtitle">Vehicle Title</label>
        <input type="text" class="form-control" id="vtitle" name="vtitle" required>
    </div>
    <div class="form-group">
        <label for="cat_img">Upload Vehicle Image</label>
        <input type="file" class="form-control" id="cat_img" name="cat_img" required>
    </div>
    <!-- Add more fields as needed -->
    <button type="submit" class="btn btn-primary">Create Vehicle</button>
</form>
@endsection 