<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'tbl_page';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description', 
        'status',
        'summary',
        'show_map',
        'show_process',
        'show_faq',
        'parent',
        'slug',
    ];

    // Cast toggles to boolean for easy handling
    protected $casts = [
        'show_map' => 'boolean',
        'show_process' => 'boolean',
        'show_faq' => 'boolean', 
    ];

    public function parentPage()
    {
        return $this->belongsTo(Page::class, 'parent', 'id')->withDefault([
            'title' => '——'
        ]);
    }

}
