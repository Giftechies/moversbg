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
    public function children()
    {
        return $this->hasMany(Page::class, 'parent', 'id');
    }

     public function setDescriptionAttribute($value)
    {
        $decoded = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $clean = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $decoded);
        $clean = preg_replace('/(<[^>]+) class=".*?"/i', '$1', $clean);
        $clean = preg_replace('/(<[^>]+) dir=".*?"/i', '$1', $clean);
        $clean = strip_tags($clean, '<p><strong><em><ul><ol><li><br><h1><h2><h3><a>');
        $this->attributes['description'] = trim(preg_replace('/\s+/', ' ', $clean));
    }

}
