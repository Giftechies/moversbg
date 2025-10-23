@extends('layouts.admin')

@section('content')
    <h4>Categories List</h4>
    <a href="{{ route('pcats.create') }}" class="btn btn-success mb-2">Add Category</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pcats as $pcat)
                <tr>
                    <td>{{ $pcat->id }}</td>
                    <td>{{ $pcat->title }}</td>
                    <!-- <td>
                        @switch($pcat->title)
                            @case('Kitchen')
                                <i class="fa-solid fa-kitchen-set"></i>
                                @break
                            @case('Bedroom')
                                <i class="fa-solid fa-bed"></i>
                                @break
                            @case('Lounge')
                                <i class="fa-solid fa-couch"></i>
                                @break
                            @case('Dining')
                                <i class="fa-solid fa-utensils"></i>
                                @break
                            @case('Office')
                                <i class="fa-solid fa-briefcase"></i>
                                @break
                            @case('Laundry')
                                <i class="fa-solid fa-soap"></i>
                                @break
                            @case('Hall')
                                <i class="fa-solid fa-chair"></i>
                                @break
                            @case('Garage & Outside')
                                <i class="fa-solid fa-car"></i>
                                @break
                            @case('Cartoons & Boxes')
                                <i class="fa-solid fa-box"></i>
                                @break
                            @default
                                <i class="fa-solid fa-folder"></i>
                        @endswitch
                    </td> -->
                    <td>{{ $pcat->icon}}</td>
                    <td>{{ $pcat->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('pcats.edit', $pcat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pcats.destroy', $pcat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
