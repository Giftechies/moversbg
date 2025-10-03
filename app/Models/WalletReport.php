<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletReport extends Model
{
    use HasFactory;

    protected $table = 'wallet_report';

    protected $fillable = [
        'uid',
        'message',
        'status',
        'amt',
    ];

    // Example relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}


