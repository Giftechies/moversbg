@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Edit Setting</h4>
                                <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label><span class="text-danger">*</span> Website Name</label>
                                            <input type="text" class="form-control" value="{{ $setting->webname }}" name="webname" required>
                                        </div>
                                        <div class="form-group col-3">
                                            <label><span class="text-danger">*</span> Website Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="weblogo" class="custom-file-input form-control">
                                                <label class="custom-file-label">Choose Website Image</label>
                                                <br>
                                                <img src="{{ asset($setting->weblogo) }}" width="60" height="60">
                                            </div>
                                        </div>
                                        <!-- Add more fields as needed -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mb-2">Edit Setting</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection