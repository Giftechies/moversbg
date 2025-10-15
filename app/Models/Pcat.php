<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pcat extends Model
{
     use HasFactory;

    protected $table = 'tbl_pcat';

    protected $fillable = [
        'title',
        'status',
    ]; 

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
    
}
