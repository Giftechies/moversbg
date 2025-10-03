<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Rider extends Model
{
    use HasFactory;

    protected $table = 'tbl_rider';

    protected $fillable = [
        'title',
        'rimg',
        'status',
        'rate',
        'lcode',
        'full_address',
        'pincode',
        'landmark',
        'commission',
        'bank_name',
        'ifsc',
        'receipt_name',
        'acc_number',
        'paypal_id',
        'upi_id',
        'email',
        'password',
        'rstatus',
        'mobile',
        'accept',
        'reject',
        'complete',
        'dzone',
        'vehiid',
    ];

    protected $hidden = [
        'password',
    ];

    // Mutator for password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Example relationship
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehiid');
    }
}