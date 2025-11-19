<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTypes extends Model
{
    use HasFactory;

    protected $table = 'tbl_vehicle_types';

    protected $fillable = [
        'title',
        'img',
        'status',
        'description',
        'ukms',
        'uprice',
        'aprice',
        'capcity',
        'size',
        'ttime',
    ];

    // Example relationships
    public function riders()
    {
        return $this->hasMany(Rider::class, 'vehiid');
    }
    public function vehicles()
{
    return $this->hasMany(Vehicle::class, 'type_id');
}
}
