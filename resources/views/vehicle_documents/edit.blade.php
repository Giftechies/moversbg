@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Vehicle Document</div> 
                @php //print_r($vehicleDocument); die; @endphp
                <div class="card-body">
                    <form action="{{ route('vehicle-documents.update', $vehicleDocument ) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT') 

                        <div class="form-group">
                            <label for="name">Document Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $vehicleDocument->name) }}" required maxlength="50">
                            @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="file">File (optional)</label>
                            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                            <small class="form-text text-muted">Current file: <a href="{{ Storage::url($vehicleDocument->file) }}" target="_blank">Download</a></small>
                            @error('file')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('vehicle-documents.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection