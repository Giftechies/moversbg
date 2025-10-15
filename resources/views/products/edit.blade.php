@extends('layouts.admin')

@section('content')
    <h4>Edit Product</h4>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="cat_id" id="cat_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->cat_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="title" value="{{ $product->title }}" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label>Product Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>UnPublish</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
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
                                    $("#subcat_id").append('<option value="' + value.id + '">' + value.title + '</option>');
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