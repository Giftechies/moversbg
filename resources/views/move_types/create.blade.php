@extends('layouts.admin')

@section('content')
<h1>Create Move Type</h1>
<form method="POST" action="{{ route('move_types.store') }}" class="container mt-5">
    @csrf
    <div class="form-group mb-3">
        <h1><b>Where are you moving from?</b></h1><br>
        <p>Please tell us the exact address you're moving from.</p>
        
     
        <label for="name" class="form-label fw-bold">Pickup adress</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        By proceeding you confirm that you have read and agree to the terms and conditions and privacy policy. 
       
    <!-- <br><br><form method="post"> -->
        
   

    <!-- </form> -->
    <div class="form-group mb-3">
        <label for="status" class="form-label fw-bold">Status:</label>
        <select name="status" class="form-select">
            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Create</button><br>

       <a href="{{ route('property_types.create') }}" class="btn btn-success">Next</a>
      
</form>                             
@endsection