<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;

    protected $table = 'tbl_cash';

    protected $fillable = [
        'rid',
        'amt',
        'message',
        'pdate',
    ];
}
