<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'doc_file',
        'business_id',
    ];

    // A document belongs to a Business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
