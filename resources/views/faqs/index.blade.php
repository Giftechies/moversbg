@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Header -->
                <div class="row">
                    <div class="col-lg-8 top">
                        <h2 class="card-title heading">FAQs List</h2>
                    </div>
                    <div class="col-lg-4 top text-end">
                        <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">
                            Add FAQ
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered align-middle">
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
                                <a href="{{ route('faqs.edit', $faq->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('faqs.destroy', $faq->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection