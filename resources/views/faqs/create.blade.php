@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New FAQ</h2>
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
            @error('question') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group mb-3">
            <label>Answer</label>
            <textarea name="answer" class="form-control" rows="4" required>{{ old('answer') }}</textarea>
            @error('answer') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save FAQ</button>
        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
