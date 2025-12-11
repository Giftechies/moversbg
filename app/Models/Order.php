<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\DropPoint;
use App\Models\LogisticsProduct;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order';

    protected $fillable = ['uid','vendor_id','dzone','vehicleid','pick_address','pick_lat','pick_lng','subtotal','o_total','cou_id','cou_amt','trans_id','o_status','dcommission','wall_amt','p_method_id','from_date','to_date','date_type','date_range','rlats','rlongs','delivertime','pick_name','pick_mobile','property_type','bed_rooms','place_type','street_types','storage_unit','facilities_required','additional_notes','meters','flights','cancel_reason','pickup_address_discreetly'];

    // Example relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
 
    public function dropPoint()
    {
        return $this->hasOne(DropPoint::class, 'order_id', 'id');
    }

    public function logisticsProducts()
    {
        return $this->hasMany(LogisticsProduct::class, 'oid');
    } 
    public function OrderReschedule()
    {
        return $this->hasMany(OrderReschedule::class, 'order_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'order_id');
    }

}
