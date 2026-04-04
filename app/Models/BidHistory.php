<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidHistory extends Model
{
    protected $fillable = [
        'bid_id',
        'order_id',
        'vendor_id',
        'amount',
        'action',
        'reason',
    ];

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }
}