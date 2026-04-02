<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessVehicle extends Model
{
 protected $fillable = [
        'vehicle_no',
        'model',
        'registration_copy',
        'insurance',
        'attachment1_name',
        'attachment_file',
        'status',
    ];

    // Optional: If you use timestamps (created_at, updated_at)
    public $timestamps = true;
}
