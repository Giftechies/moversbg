
@extends('layouts.admin')

@section('content')
<h4>Add FAQs</h4>

<form action="{{ route('faqs.store') }}" method="POST">
    @csrf

    <div id="faq-container">
        <!-- First FAQ block -->
        <div class="faq-block mb-3 border p-3 rounded">
            <div class="mb-2">
                <label>Question</label>
                <input type="text" name="question[]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Answer</label>
                <textarea name="answer[]" class="form-control answer-editor" required></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-faq">- Remove</button>
        </div>
    </div>

    <button type="button" class="btn btn-primary mb-3" id="add-faq">+ Add FAQ</button>
    <br>
    <button type="submit" class="btn btn-success">Save All FAQs</button>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize CKEditor for the first textarea
    ClassicEditor.create(document.querySelector('.answer-editor')).catch(console.error);

    // Add new FAQ block
    document.getElementById('add-faq').addEventListener('click', function () {
        let container = document.getElementById('faq-container');

        let block = document.createElement('div');
        block.classList.add('faq-block', 'mb-3', 'border', 'p-3', 'rounded');
        block.innerHTML = `
            <div class="mb-2">
                <label>Question</label>
                <input type="text" name="question[]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Answer</label>
                <textarea name="answer[]" class="form-control answer-editor" required></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-faq">- Remove</button>
        `;
        container.appendChild(block);

        // Initialize CKEditor for the new textarea
        ClassicEditor.create(block.querySelector('.answer-editor')).catch(console.error);

        // Attach remove event
        block.querySelector('.remove-faq').addEventListener('click', function () {
            block.remove();
        });
    });

    // Remove existing FAQ block
    document.querySelectorAll('.remove-faq').forEach(function (btn) {
        btn.addEventListener('click', function () {
            btn.closest('.faq-block').remove();
        });
    });
});
</script>
@endsection
