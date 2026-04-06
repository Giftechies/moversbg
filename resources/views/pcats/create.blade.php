@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Add Category</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('pcats.index') }}" class="btn btn-secondary  btn1">
                            Back
                        </a>
                    </div>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('pcats.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <input type="text" class="form-control" name="icon" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category Status</label>
                        <select name="status" class="form-select">
                            <option value="1">Publish</option>
                            <option value="0">UnPublish</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success btn1">
                            Add Category
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