<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcat extends Model
{
    use HasFactory;

    protected $table = 'tbl_subcat';

    protected $fillable = [
        'cat_id',
        'title',
        'status',
    ];

    public function Categories(): BelongsTo
    {
        return $this->belongsTo(Pcat::class, 'cat_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'subcat_id');
    }
}
