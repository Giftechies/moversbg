<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order';

    protected $fillable = [
        'uid',
        'rid',
        'cat_id',
        'dzone',
        'vehicleid',
        'pick_address',
        'pick_lat',
        'pick_lng',
        'subtotal',
        'o_total',
        'cou_id',
        'cou_amt',
        'trans_id',
        'o_status',
        'dcommission',
        'wall_amt',
        'p_method_id',
        'odate',
        'rlats',
        'rlongs',
        'delivertime',
        'pick_name',
        'pick_mobile',
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
