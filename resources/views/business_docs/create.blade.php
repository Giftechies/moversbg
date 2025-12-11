@extends('layouts.pages')  

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Upload Documents for {{ $business->name }}</h2>   
                
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('business-docs.store', $business) }}"
          enctype="multipart/form-data">
        @csrf

        <div id="doc-fields">
            <div class="row mb-3">
                <div class="col-md-5">
                    <label>Document Name</label>
                    <input type="text" name="name[]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label>File</label>
                    <input type="file" name="doc_file[]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-field mt-3">−</button>
                </div>
            </div>
        </div>

        <button type="button" id="add-more" class="btn btn-secondary">Add more</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

               {{-- List existing docs for this business --}}
    @if($business->docs->isEmpty())
        <p class="mt-3">No documents yet.</p>
    @else
        <table class="table table-sm mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>File</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($business->docs as $doc)
                    <tr>
                        <td>{{ $doc->name }}</td>
                        <td><a href="{{ asset('storage/' . $doc->doc_file) }}" target="_blank">View</a></td>
                        <td class="text-right">
                            <a href="{{ route('business-docs.edit',  $doc->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('business-docs.destroy', $doc->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this document?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('add-more').addEventListener('click', function () {
        const container = document.getElementById('doc-fields');
        const row = container.firstElementChild.cloneNode(true);
        row.querySelectorAll('input').forEach(el => el.value = '');
        container.appendChild(row);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-field')) {
            e.target.closest('.row').remove();
        }
    });
</script>
@endsection 
