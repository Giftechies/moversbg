<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zones';

    protected $fillable = [
        'title',
        'status',
        'coordinates',
        'alias',
    ];

    // Handling spatial data might require specific handling
    protected $casts = [
        'coordinates' => 'array', // Note: Laravel's casting for spatial types may need additional packages or handling
    ];
}