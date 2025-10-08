@extends('layouts.admin')
@section('content')
    <h4>Add Scoupon</h4>
    <form method="POST" action="{{ route('scoupons.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="ctitle" required>
        </div>
        <div class="form-group">
            <label>Value</label>
            <input type="text" class="form-control" name="c_value" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="c_img">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="c_desc"></textarea>
        </div>
        <div class="form-group">
            <label>Min Amount</label>
            <input type="text" class="form-control" name="min_amt">
        </div>
        <button type="submit" class="btn btn-primary">Add Scoupon</button>
    </form>
@endsection