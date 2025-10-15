<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function Pcat(): BelongsTo
    {
        return $this->belongsTo(Pcat::class, 'cat_id');
    } 
}


