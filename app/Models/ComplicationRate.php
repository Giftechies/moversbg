<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplicationRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
        'type',
        'status',
    ];

    protected $casts = [ 
        'rate' => 'float',
        'status' => 'boolean',
    ];
}