@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h4>
                          <form method="POST" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @isset($category)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="cat_name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control @error('cat_name') is-invalid @enderror" id="cat_name" name="cat_name" value="{{ old('cat_name', $category->cat_name ?? '') }}" required>
                                    @error('cat_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="cat_img" class="form-label">Category Image</label>
                                    @isset($category) && $category->cat_img)
                                        <div class="mb-2">
                                            <img src="{{ asset($category->cat_img) }}" width="100" class="img-thumbnail">
                                        </div>
                                    @endisset
                                    <input type="file" class="form-control @error('cat_img') is-invalid @enderror" id="cat_img" name="cat_img" {{ !isset($category) ? 'required' : '' }}>
                                    @error('cat_img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                              <div class="row">
                           <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1" {{ (old('status', $category->cat_status ?? '') == 1) ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ (old('status', $category->cat_status ?? '') == 0) ? 'selected' : '' }}>Unpublished</option>
                                </select>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Add' }} Category</button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection