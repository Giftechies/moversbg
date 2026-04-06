@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">Create New Page</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('pages.index') }}" class="btn btn-secondary btn1">
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
                <form action="{{ route('pages.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf

                    @include('pages.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success btn1">
                            Save
                        </button>

                        <a href="{{ route('pages.index') }}" class="btn btn-secondary btn1">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection