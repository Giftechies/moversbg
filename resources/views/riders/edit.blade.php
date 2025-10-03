@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Edit Delivery Boy</h4>
                                <form method="post" action="{{ route('riders.update', $rider->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label><span class="text-danger">*</span> Delivery Boy Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Delivery Boy Name" name="title" value="{{ $rider->title }}" required>
                                        </div>
                                        <div class="form-group col-4">
                                            <label><span class="text-danger">*</span> Delivery Boy Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="rimg" class="custom-file-input form-control">
                                                <label class="custom-file-label">Choose Delivery Boy Image</label>
                                                <br>
                                                <img src="{{ asset($rider->rimg) }}" width="100" height="100">
                                            </div>
                                        </div>
                                        <!-- Add more fields as needed -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mb-2">Update Delivery Boy</button>
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