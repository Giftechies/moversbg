<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = [
        'order_id',
        'vendor_id',
        'amount',
        'comments',
        'status',
    ];

    // A bid belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // A bid belongs to a vendor (user)
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}