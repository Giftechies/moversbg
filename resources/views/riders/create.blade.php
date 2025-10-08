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

<div >
     <form action="{{ route('riders.store') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <label>Title:</label><br>
    <input type="text" name="title" placeholder ="title"><br><br>

    <label>Rider Image:</label><br>
    <input type="file" name="rimg" placeholder="uploard image"><br><br>

    <label>Status:</label><br>
    <input type="number" name="status"><br><br>

    <label>Rate:</label><br>
    <input type="number" name="rate" placeholder="rate"><br><br>

    <label>License Code:</label><br>
    <input type="number" name="lcode" placeholder="licence code"><br><br>

    <label>Full Address:</label><br>
    <input type="text" name="full_address"> adress</input><br><br>

    <label>Pincode:</label><br>
    <input type="number" name="pincode" placeholder="pincodes"><br><br>

    <label>Landmark:</label><br>
    <input type="text" name="landmark" placeholder="landmark"><br><br>

    <label>Commission:</label><br>
    <input type="number" name="commission" placeholder="commission "><br><br>

    <label>Bank Name:</label><br>
    <input type="text" name="bank_name" placeholder="bank name"><br><br>

    <label>IFSC Code:</label><br>
    <input type="text" name="ifsc" placeholder="ifsc code"><br><br>

    <label>Receipt Name:</label><br>
    <input type="text" name="receipt_name" placeholder="receipt name "><br><br>

    <label>Account Number:</label><br>
    <input type="text" name="acc_number" placeholder="account number" ><br><br>

    <label>PayPal ID:</label><br>
    <input type="number" name="paypal_id"><br><br>

    <label>UPI ID:</label><br>
    <input type="number" name="upi_id"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <label>Rider Status:</label><br>
    <input type="number" name="rstatus"><br><br>

    <label>Mobile:</label><br>
    <input type="number" name="mobile"><br><br>

    <label>Accept:</label><br>
    <input type="tinyint" name="accept"><br><br>

    <label>Reject:</label><br>
    <input type="tinyint" name="reject"><br><br>

    <label>Complete:</label><br>
    <input type="tinyint" name="complete"><br><br>

    <label>Delivery Zone:</label><br>
    <input type="number" name="dzone"><br><br>

    <label>Vehicle ID:</label><br>
    <input type="number" name="vehiid" placeholder="vechicle id"><br><br>

    <button type="submit">Submit</button>
  </form>

</div>
@endsection