<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;

    protected $table = 'tbl_subcat';

    protected $fillable = [
        'cat_id',
        'title',
        'status',
    ];

    // Example relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'subcat_id');
    }
}
