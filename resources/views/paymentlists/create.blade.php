@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Payment Gateway</h4>
                                <form method="post" action="{{ route('paymentlists.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Payment Gateway Name</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway SubTitle</label>
                                        <input type="text" class="form-control" name="subtitle" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway Image</label>
                                        <input type="file" name="img" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway Attributes</label>
                                        <input type="text" class="form-control" name="attributes" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Gateway Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Publish</option>
                                            <option value="0">UnPublish</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Show On Wallet?</label>
                                        <select name="p_show" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Payment Gateway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
