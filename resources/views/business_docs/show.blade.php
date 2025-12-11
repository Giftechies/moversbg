@extends('layouts.pages') 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Edit Document</h2> 
 
<div class="container">
    <h2>{{ $doc->name }}</h2>
    <a href="{{ asset($doc->doc_file) }}" target="_blank">View file</a>
    <br>
    <a href="{{ route('business-docs.edit', $doc) }}">Edit</a>
</div>
</div>
        </div>
    </div>
</div>         
@endsection
