@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Edit Banner</h4>
                                <form method="post" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <input type="file" name="cat_img" class="form-control">
                                        <br>
                                        <img src="{{ asset($banner->img) }}" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label>Banner Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Publish</option>
                                            <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>UnPublish</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mb-2">Update Banner</button>
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