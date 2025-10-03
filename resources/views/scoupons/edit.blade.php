@extends('layouts.admin')

@section('content')
    <h4>Edit Scoupon</h4>
    <form method="POST" action="{{ route('scoupons.update', $scoupon->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="c_title" value="{{ $scoupon->c_title }}" required>
        </div>
        <div class="form-group">
            <label>Value</label>
            <input type="text" class="form-control" name="c_value" value="{{ $scoupon->c_value }}" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="c_img">
            @if($scoupon->c_img)
                <img src="{{ asset('storage/' . $scoupon->c_img) }}" width="100" alt="Scoupon Image">
            @endif
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $scoupon->status == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ $scoupon->status == 0 ? 'selected' : '' }}>UnPublish</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="c_desc">{{ $scoupon->c_desc }}</textarea>
        </div>
        <div class="form-group">
            <label>Min Amount</label>
            <input type="text" class="form-control" name="min_amt" value="{{ $scoupon->min_amt }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Scoupon</button>
    </form>
@endsection

