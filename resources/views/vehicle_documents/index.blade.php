@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Vehicle Documents
                    <a href="{{ route('vehicle-documents.create', ['vehicle_id' => $id]) }}" class="btn btn-primary float-right">Upload New Document</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr> 
                                <th>Name</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documents as $doc)
                                <tr>                                    
                                    <td>{{ $doc->name }}</td>
                                    <td><a href="{{  url($doc->file) }}" target="_blank">Download</a></td>
                                    <td>
                                        <a href="{{ route('vehicle-documents.edit', $doc->id) }}" class="btn btn-sm btn-warning">Edit</a> 
                                        <form action="{{ route('vehicle-documents.destroy', $doc->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this document?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center">No documents found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

