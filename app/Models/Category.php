<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_category';

    protected $fillable = [
        'cat_name',
        'cat_status',
        'cat_img',
    ];

    // Example relationships
    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }

    public function Pcats()
    {
        return $this->hasMany(Pcat::class, 'cat_id');
    }

}
