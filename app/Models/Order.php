<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order';

    protected $fillable = ['uid','rid','dzone','vehicleid','pick_address','pick_lat','pick_lng','subtotal','o_total','cou_id','cou_amt','trans_id','o_status','dcommission','wall_amt','p_method_id','odate','date_type','rlats','rlongs','delivertime','pick_name','pick_mobile','property_type','bed_rooms','place_type','street_types','storage_unit','facilities_required','additional_notes','meters','flights'];

    // Example relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
