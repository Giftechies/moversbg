<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;

class PageApiController extends Controller
{
    /**
     * Return all parent pages with their child pages (one level deep)
     */
    public function index()
    {
        // Get only top-level pages (no parent)
        $pages = Page::with(['children'])
            ->whereNull('parent')
            ->orderBy('title', 'asc')
            ->get(); 
        return PageResource::collection($pages);
    }

    /**
     * Return a single page with its direct children
     */
   public function show($slug)
    {
        // Find page by slug and include its direct children
        $page = Page::with('children')->where('slug', $slug)->first();

        if (!$page) {
            return response()->json([
                'status' => false,
                'message' => 'Page not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $page,
        ]);
    }
}
