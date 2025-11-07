<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Business extends Model
{
    use HasFactory;

    protected $table = 'tbl_business';

    protected $fillable = [
        'name', 'email','mobile', 'user_id', 'abn', 'img', 'website', 'zone_id', 'address', 
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'business_id');
    }
}

