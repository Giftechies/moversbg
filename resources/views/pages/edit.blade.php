@extends('layouts.pages')

@section('content')
<div class="container">
    <h2>Edit Page</h2>
    <form action="{{ route('pages.update', $page->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('pages.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
