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
        'name',
        'rimg',
        'dl_exp_date',
        'dl',
        'lcode',
        'full_address',
        'pincode',
        'landmark', 
        'email',
        'password',
        'rstatus',
        'business_id',
        'mobile' 
    ];

    protected $hidden = [
        'password',
    ];

    // Mutator for password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    } 
}