@extends('layouts.admin')

@section('content')
   <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
              
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <h4 class="card-title mb-4">Add Delivery Boy</h4>
                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
                <form method="post" action="{{ route('riders.update', $rider->id) }}" enctype="multipart/form-data">
                         @csrf
                          @method('PUT')
                         <label>Title:</label><br>
    <input type="text" name="title"  value="{{ old ('title' ,$rider->title) }}"><br><br>
      <label>Email:</label><br>
    <input type="email" name="email" value="{{ old ('email' ,$rider->email) }}"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
       <label>Rider Status:</label><br>
    <input type="number" name="rstatus" value="{{ old ('rstatus' , $rider->rstatus)}}"><br><br>

    <label>Full Address:</label><br>
    <input type="text" name="full_address" value="{{ old ('full_address',$rider->full_address )}}"> adress</input><br><br>
    
    <label>Mobile:</label><br>
    <input type="number" name="mobile" value="{{old ('mobile',$rider->mobile)}}"><br><br>

      <label>Accept:</label><br>
    <input type="tinyint" name="accept" value="{{old ('accept',$rider->accept)}}"><br><br>
    
    <label>Reject:</label><br>
    <input type="tinyint" name="reject" value="{{old ('reject',$rider->reject)}}"><br><br>

    <label>Complete:</label><br>
    <input type="tinyint" name="complete" value="{{old ('complete',$rider->complete)}}"><br><br>

 <label>Delivery Zone:</label><br>
    <input type="number" name="dzone" value="{{old('dzone',$rider->dzone)}}"><br><br>
  
       <label>Status:</label><br>
        <select name="status">
                <option value="">Select Status</option>
                <option value="1" {{ old('status', $rider->status) == '1' ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ old('status', $rider->status) == '0' ? 'selected' : '' }}>UnPublish</option>
            </select>

    <button type="submit"> update</button>

                </form>

</div>
   
@endsection
