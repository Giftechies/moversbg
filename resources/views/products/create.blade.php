@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Add Product</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn1">
                            Back
                        </a>
                    </div>
                </div>

                <!-- Errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf

                    <div >
                        <label class="lable">Select Category</label>
                        <select class="form-select" name="cat_id" id="cat_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div >
                        <label class="lable">Product Name</label>
                        <input type="text" 
                               class="form-control" 
                               name="title" 
                               required>
                    </div>

                    <div >
                        <label class="lable">Product Price</label>
                        <input type="number" 
                               class="form-control" 
                               name="price" 
                               required>
                    </div>

                    <div >
                        <label class="lable">Product Status</label>
                        <select name="status" class="form-select">
                            <option value="1">Publish</option>
                            <option value="0">UnPublish</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success btn1 ">
                            Add Product
                        </button>

                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn1">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection