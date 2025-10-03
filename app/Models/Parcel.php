<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $table = 'tbl_parcel';

    protected $fillable = [
        'uid',
        'rid',
        'cat_id',
        'pickup_address',
        'pick_lat',
        'pick_long',
        'pick_pincode',
        'drop_address',
        'drop_lat',
        'drop_long',
        'drop_pincode',
        'order_date',
        'total',
        'transaction_id',
        'p_method_id',
        'dzone',
        'status',
        'dcommission',
        'rlats',
        'rlongs',
        'delivertime',
        'vehicleid',
        'parcel_weight',
        'parcel_dimension',
        'wall_amt',
    ];

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
