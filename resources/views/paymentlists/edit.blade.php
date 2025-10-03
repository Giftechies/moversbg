@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Update Payment Gateway</h4>
                                <form method="post" action="{{ route('paymentlists.update', $paymentList->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Payment Gateway Name</label>
                                        <input type="text" class="form-control" disabled value="{{ $paymentList->title }}" name="cname">
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway SubTitle</label>
                                        <input type="text" class="form-control" value="{{ $paymentList->subtitle }}" name="ptitle" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway Image</label>
                                        <input type="file" name="cat_img" class="form-control">
                                        <br>
                                        <img src="{{ asset($paymentList->img) }}" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway Attributes</label>
                                        <input type="text" class="form-control" value="{{ $paymentList->attributes }}" name="p_attr" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $paymentList->status == 1 ? 'selected' : '' }}>Publish</option>
                                            <option value="0" {{ $paymentList->status == 0 ? 'selected' : '' }}>UnPublish</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Show On Wallet?</label>
                                        <select name="p_show" class="form-control">
                                            <option value="1" {{ $paymentList->p_show == 1 ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ $paymentList->p_show == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Payment Gateway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection