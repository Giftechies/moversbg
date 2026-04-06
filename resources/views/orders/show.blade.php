@extends('layouts.admin')

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

<table class="table table-striped">
    <tr>
        <th>Order #{{ $order->id }}</th>
    </tr>
</table> 


<table class="table "> 
    
   
    @if(!empty($order->user->name))
        <tr>
            <td class="lable">User</td>
            <td>{{ $order->user->name }}</td>
        </tr>
    @endif
    @if(!empty($order->user->email))
        <tr>
            <td class="lable">Email</td>
            <td>{{ $order->user->email }}</td>
        </tr>
    @endif
    @if(!empty($order->user->mobile))
        <tr>
            <td class="lable">Mobile</td>
            <td>{{ $order->user->mobile }}</td>
        </tr>
    @endif
    @if(!empty($order->delivertime))
        <tr>
            <td class="lable">Delivery Time</td>
            <td>{{ $order->delivertime }}</td>
        </tr>
    @endif
    @if(!empty($order->pick_name))
        <tr>
            <td class="lable">Pickup Name</td>
            <td>{{ $order->pick_name }}</td>
        </tr>
    @endif
    @if(!empty($order->pick_mobile))
        <tr>
            <td class="lable">Pickup Mobile</td>
            <td>{{ $order->pick_mobile }}</td>
        </tr>
    @endif
    @if(!empty($order->property_type))
        <tr>
            <td class="lable">Property Type</td>
            <td>{{ $order->property_type }}</td>
        </tr>
    @endif
    @if(!empty($order->place_type))
        <tr>
            <td class="lable">Place Type</td>
            <td>{{ $order->place_type }}</td>
        </tr>
    @endif
    @if(!empty($order->storage_unit))
        <tr>
            <td class="lable">Storage Unit</td>
            <td>{{ $order->storage_unit }}</td>
        </tr>
    @endif
    @if(!empty($order->facilities_required))
        <tr>
            <td class="lable">Facilities Required</td>
            <td>@if($order->facilities_required == 1) Yes @endif </td>
        </tr>
    @endif
    @if(!empty($order->additional_notes))
        <tr>
            <td class="lable">Additional Notes</td>
            <td>{{ $order->additional_notes }}</td>
        </tr>
    @endif
    @if(!empty($order->dropPoint->drop_address))
        <tr>
            <td class="lable">Drop Point</td>
            <td>{{ $order->dropPoint->drop_address }}</td>
        </tr>
    @endif 
</table>

<h2 class="heading mb-4">Logistics Products</h2>
<table class="table table-striped">
    <tr>
        <th >Product Name</th>
        <th>Quantity</th>
    </tr>
    @foreach($order->logisticsProducts as $product)
        @if(!empty($product->product_name) && !empty($product->quantity))
            <tr>
                <td >{{ $product->product_name }}</td>
                <td>{{ $product->quantity }}</td>
            </tr>
        @endif
    @endforeach
</table> 
<div class="container">
    @if(!empty($removalist))
        @if(!empty($order->bids[0]))
             <h2>Bid  Details</h2>
            <div class="form-group">
                <label for="amount">Bid Amount: </label> {{$order->bids[0]->amount}}
            </div>

            <div class="form-group">
                <label for="comments">Comments:  </label> {{$order->bids[0]->comments}}
            </div>
        @endif
            <br>
        @php
           $order_id = $order->id;
        @endphp
        @if(empty($order->vendor_id))
                @if(empty($order->bids[0]))
                     <h2>Place a Bid  </h2>
                    <form method="POST" action="{{ route('orders.bid.store', $order_id) }}">
                @else
                     <h2>Update Bid  </h2>
                    <form method="POST" action="{{ route('orders.bid.update', $order_id) }}">
                @endif
                    @csrf

                    <div class="form-group">
                        <label for="amount">Bid Amount</label>
                        <input type="number" step="0.01" min="0.01" name="amount"
                               class="form-control @error('amount') is-invalid @enderror"
                               value="{{ old('amount') }}" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments  </label>
                        <textarea name="comments" rows="3" class="form-control @error('comments') is-invalid @enderror">{{ old('comments') }}</textarea>
                        @error('comments')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Bid</button> 
                </form>
            @endif
        @endif
</div>
            </div>

        </div>

    </div>

</div>

@endsection

