@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Edit Category</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('pcats.index') }}" class="btn btn-secondary btn1">
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
                <form method="POST" action="{{ route('pcats.update', $pcat->id) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class=" lable">Category Name</label>
                        <input type="text" 
                               class="form-control" 
                               name="title" 
                               value="{{ $pcat->title }}" 
                               required>
                    </div>

                    <div >
                        <label class=" lable">Icon</label>
                        <input type="text" 
                               class="form-control" 
                               name="icon"  
                               value="{{ $pcat->icon }}"  
                               required>
                    </div>

                    <div class="mb-3">
                        <label class=" lable">Category Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $pcat->status == 1 ? 'selected' : '' }}>
                                Publish
                            </option>
                            <option value="0" {{ $pcat->status == 0 ? 'selected' : '' }}>
                                UnPublish
                            </option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success btn1">
                            Update Category
                        </button>

                        <a href="{{ route('pcats.index') }}" class="btn btn-secondary btn1">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection