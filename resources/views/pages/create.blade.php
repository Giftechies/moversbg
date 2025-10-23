@extends('layouts.pages')

@section('content')
    <!-- <h4>Add Page</h4> -->
    <form method="POST" action="{{ route('pages.store') }}">
        @csrf
       
        <div class="row">
            <div class="form-group col-md-6">
                <label>Page Title</label>
                 <!-- <h1> this is page</h1> -->
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group col-md-6">
                <label>Page Status</label>
                <select name="status" class="form-control" required>
                    <option value="">Select Page Status</option>
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label>Page Description</label>
                <textarea id="summernote" class="form-control" name="description" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Page</button>
    </form>
@endsection
