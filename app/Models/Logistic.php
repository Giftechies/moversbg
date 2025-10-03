<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    use HasFactory;

    protected $table = 'tbl_logistics';

    protected $fillable = [
        'uid',
        'rid',
        'pickup_address',
        'pick_lat',
        'pick_long',
        'drop_address',
        'drop_lat',
        'drop_long',
        'pick_has_lift',
        'drop_has_lift',
        'pick_floor_no',
        'drop_floor_no',
        'logistic_date',
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
        'wall_amt',
    ];

    // Example relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}

