@extends('layouts.admin')

@section('content')
    <h4>Edit Zone Manager</h4>
    <form method="POST" action="{{ route('managers.update', $manager->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-3">
                <label>Zone Manager Name</label>
                <input type="text" class="form-control" name="name" value="{{ $manager->name }}" required>
            </div>
            <div class="form-group col-3">
                <label>Zone Manager Image</label>
                <input type="file" class="form-control" name="img">
                @if($manager->img)
                    <img src="{{ asset('storage/' . $manager->img) }}" width="100" alt="Manager Image">
                @endif
            </div>
            <div class="form-group col-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $manager->status == 1 ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $manager->status == 0 ? 'selected' : '' }}>UnPublish</option>
                </select>
            </div>
            <div class="form-group col-3">
                <label>Mobile number</label>
                <input type="text" class="form-control" name="mobile" value="{{ $manager->mobile }}" required>
            </div>
            <div class="form-group col-6">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ $manager->email }}" required>
            </div>
            <div class="form-group col-6">
                <label>Password (leave blank to keep current)</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-12">
                <label>Select Zone</label>
                <select name="zone_id" class="form-control" required>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}" {{ $manager->zone_id == $zone->id ? 'selected' : '' }}>{{ $zone->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-2">Update Zone Manager</button>
            </div>
        </div>
    </form>
@endsection

