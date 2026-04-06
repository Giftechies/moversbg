@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Edit Product</h2>
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
                <form method="POST" action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')

                    <div >
                        <label class="lable ">Select Category</label>
                        <select class="form-select" name="cat_id" id="cat_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $product->cat_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div >
                        <label class="lable ">Product Name</label>
                        <input type="text" 
                               class="form-control" 
                               name="title" 
                               value="{{ $product->title }}" 
                               required>
                    </div>

                    <div >
                        <label class="lable ">Product Price</label>
                        <input type="number" 
                               class="form-control" 
                               name="price" 
                               value="{{ $product->price }}" 
                               required>
                    </div>

                    <div >
                        <label class="lable ">Product Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                                Publish
                            </option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>
                                UnPublish
                            </option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success btn1">
                            Update Product
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#cat_id').change(function() {
            var catId = $(this).val();
            if (catId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('get.subcategories', '') }}/" + catId,
                    success: function(res) {
                        if (res) {
                            $("#subcat_id").empty();
                            $.each(res, function(key, value) {
                                $("#subcat_id").append(
                                    '<option value="' + value.id + '">' + value.title + '</option>'
                                );
                            });
                        } else {
                            $("#subcat_id").empty();
                        }
                    }
                });
            } else {
                $("#subcat_id").empty();
            }
        });
    });
</script>
@endsection