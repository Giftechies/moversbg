<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'tbl_manager';

    protected $fillable = [
        'name',
        'img',
        'status',
        'mobile',
        'email',
        'password',
        'zone_id',
    ];

    protected $hidden = [
        'password',
    ];

    // Example relationship
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    // Mutator for password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}

