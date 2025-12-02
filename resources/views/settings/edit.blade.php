@extends('layouts.admin')
@section('content')    
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Edit Settings</h2>
               <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data" class="container mt-5">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"><span class="text-danger">*</span> Website Name</label>
                        <input type="text" class="form-control @error('webname') is-invalid @enderror" value="{{ old('webname', $setting->webname) }}" name="webname" required>
                        @error('webname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"><span class="text-danger">*</span> Timezone</label>
                        <input type="text" class="form-control @error('timezone') is-invalid @enderror" value="{{ old('timezone', $setting->timezone) }}" name="timezone" required>
                        @error('timezone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"><span class="text-danger">*</span> Currency</label>
                        <input type="text" class="form-control @error('currency') is-invalid @enderror" value="{{ old('currency', $setting->currency) }}" name="currency" required>
                        @error('currency')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"><span class="text-danger">*</span> Email</label>
                        <input type="email" class="form-control @error('semail') is-invalid @enderror" value="{{ old('semail', $setting->semail) }}" name="semail" required>
                        @error('semail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"><span class="text-danger">*</span> Mobile</label>
                        <input type="text" class="form-control @error('smobile') is-invalid @enderror" value="{{ old('smobile', $setting->smobile) }}" name="smobile" required>
                        @error('smobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"><span class="text-danger">*</span> Auth Key</label>
                        <input type="text" class="form-control @error('auth_key') is-invalid @enderror" value="{{ old('auth_key', $setting->auth_key) }}" name="auth_key" required>
                        @error('auth_key')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold">Website Image</label>
                        <div class="input-group">
                            <input type="file" name="weblogo" class="form-control" id="weblogo">
                            <label class="input-group-text" for="weblogo">Choose Website Image</label>
                        </div>
                        <img src="{{ asset($setting->weblogo) }}" width="60" height="60" class="mt-2 rounded">
                    </div>
                    <!-- Add more fields as needed -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>            
@endsection