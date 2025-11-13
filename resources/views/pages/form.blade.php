<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" id="summernote" class="form-control" rows="4">{{ old('description', $page->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Summary</label>
    <input type="text" name="summary" class="form-control" value="{{ old('summary', $page->summary ?? '') }}">
</div>
 
<div class="mb-3">
    <label>Parent Page</label>
    <select name="parent" class="form-control">
        <option value="">— No Parent —</option>
        @foreach($parents ?? [] as $parent)
            <option value="{{ $parent->id }}"
                {{ old('parent', $page->parent ?? '') == $parent->id ? 'selected' : '' }}>
                {{ $parent->title }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $page->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $page->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

        {{-- Current Image --}}
        <div class="mb-3">
            <label>Current Image</label><br>
            @if($page->image)
                <img src="{{ asset($page->image) }}" width="100" height="100" style="object-fit:cover;border-radius:8px;margin-bottom:10px;">
            @else
                <p class="text-muted">No image</p>
            @endif
        </div>

        {{-- Upload New Image --}}
        <div class="mb-3">
            <label>Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

<div class="form-check">
    <input type="checkbox" name="show_map" class="form-check-input" {{ old('show_map', $page->show_map ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Show Map</label>
</div>

<div class="form-check">
    <input type="checkbox" name="show_process" class="form-check-input" {{ old('show_process', $page->show_process ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Show Process</label>
</div>

<div class="form-check mb-3">
    <input type="checkbox" name="show_faq" class="form-check-input" {{ old('show_faq', $page->show_faq ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Show FAQ</label>
</div>