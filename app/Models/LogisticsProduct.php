<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticsProduct extends Model
{
    use HasFactory;

    protected $table = 'tbl_logistics_product';

    protected $fillable = [
        'oid',
        'product_name',
        'quantity',
        'price',
        'total',
    ];

    // Example relationship
    public function logistic()
    {
        return $this->belongsTo(Logistic::class, 'oid');
    }
}
