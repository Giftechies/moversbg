@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload New Vehicle Document</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vehicle-documents.store') }}" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicle_id}}">
                            <label for="name">Document Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required maxlength="50">
                            @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required>
                            @error('file')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection