<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
         'summary',
        'image',
        'status',
    ];

    // Automatically generate unique slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->slug = static::generateSlug($service->title);
        });

        static::updating(function ($service) {
            $service->slug = static::generateSlug($service->title, $service->id);
        });
    }

    protected static function generateSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'like', "{$slug}%")
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

      public function setDescriptionAttribute($value)
    {
        // Decode HTML entities safely
        $decoded = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Remove unwanted inline attributes
        $clean = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $decoded);
        $clean = preg_replace('/(<[^>]+) class=".*?"/i', '$1', $clean);
        $clean = preg_replace('/(<[^>]+) dir=".*?"/i', '$1', $clean);

        // ✅ Remove <p> tags that are directly inside <li>
        $clean = preg_replace('/<li[^>]*>\s*<p[^>]*>(.*?)<\/p>\s*<\/li>/i', '<li>$1</li>', $clean);

        // Keep only the allowed tags
        $clean = strip_tags($clean, '<p><strong><em><ul><ol><li><br><h1><h2><h3><a>');

        // Normalize whitespace and save
        $this->attributes['description'] = trim(preg_replace('/\s+/', ' ', $clean));
    }

}
