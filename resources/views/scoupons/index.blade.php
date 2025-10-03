@extends('layouts.app')

@section('content')
    <h4>Scoupons List</h4>
    <a href="{{ route('scoupons.create') }}" class="btn btn-success mb-2">Add Scoupon</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Value</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scoupons as $scoupon)
                <tr>
                    <td>{{ $scoupon->id }}</td>
                    <td>{{ $scoupon->c_title }}</td>
                    <td>{{ $scoupon->c_value }}</td>
                    <td>{{ $scoupon->status ? 'Publish' : 'UnPublish' }}</td>
                    <td>
                        <a href="{{ route('scoupons.edit', $scoupon->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('scoupons.destroy', $scoupon->id) }}" method="POST" style="display:inline;">
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
