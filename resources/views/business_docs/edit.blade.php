@extends('layouts.pages') 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Edit Document</h2> 
 

      @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('business-docs.update', $doc->id) }}"       enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Document Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $doc->name }}" required>
        </div>

        <div class="mb-3">
            <label>File (leave empty to keep current)</label>
            <input type="file" name="doc_file" class="form-control">
            @if($doc->doc_file)
                <a href="{{ asset('storage/' . $doc->doc_file) }}" target="_blank"
                   class="d-block mt-2">Current file</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
       
    </form>
</div>
        </div>
    </div>
</div>         
@endsection
