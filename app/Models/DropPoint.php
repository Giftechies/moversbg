<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropPoint extends Model
{
    use HasFactory;

    protected $table = 'tbl_drop_points';

    protected $fillable = ['order_id','uid','drop_address','drop_lat','drop_lng','drop_name',' drop_mobile status','photos','place_type','street_type','flights','meters' ];

    // Example relationships
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}
