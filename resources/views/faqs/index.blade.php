@extends('layouts.admin')

@section('content')
<h4>FAQs List</h4>
<a href="{{ route('faqs.create') }}" class="btn btn-success mb-2">Add FAQ</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faqs as $faq)
        <tr>
            <td>{{ $faq->id }}</td>
            <td>{{ $faq->question }}</td>
            <td>{!! Str::limit($faq->answer, 100) !!}</td>
            <td>
                <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
