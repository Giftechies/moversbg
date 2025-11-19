<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'type_id',
        'registration_no',
        'make',
        'model',
        'year', 
        'status',
        'business_id'
    ];

    public function type()
    {
        return $this->belongsTo(VehicleTypes::class);
    }
    public function documents()
    {
        return $this->hasMany(VehicleDocument::class);
    }
}
