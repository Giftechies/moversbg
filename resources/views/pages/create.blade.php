@extends('layouts.pages') 
@section('content')
<div class="container">
    <h2>Create New Page</h2>
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        @include('pages.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
