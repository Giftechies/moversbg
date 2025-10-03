<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_product';

    protected $fillable = [
        'cat_id',
        'subcat_id',
        'title',
        'price',
        'status',
    ];

    // Example relationships
    public function Pcat()
    {
        return $this->belongsTo(Pcat::class, 'cat_id');
    }

    public function Subcat()
    {
        return $this->belongsTo(Subcat::class, 'subcat_id');
    }
}

