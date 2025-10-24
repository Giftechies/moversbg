@extends('layouts.admin')

@section('content')
<h4>Edit FAQ</h4>

<form action="{{ route('faqs.update', $faq->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Question</label>
        <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
    </div>

    <div class="mb-3">
        <label>Answer</label>
        <textarea name="answer" id="editor" class="form-control" required>{{ $faq->answer }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor')).catch(console.error);
</script>
@endsection
