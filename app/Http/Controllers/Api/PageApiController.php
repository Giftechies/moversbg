<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use App\Models\Service;
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

     public function top_bar()
    {
         $pages = Page::with(['children'])
            ->whereNull('parent')
            ->orderBy('title', 'asc')
            ->get()
            ->map(function ($page) {
                $page->type = 'page';
                return $page;
            });

        // Get only the first (or only) service as an object
        $services = Service::all();
        foreach($services as $service){
            $serviceObject[] = [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'description' => $service->description,
                'image' => $service->image ? asset($service->image) : null,
                'status' => (bool) $service->status,
                'created_at' => $service->created_at->format('Y-m-d H:i:s'),
                'type' => 'service',
            ];
        }
        

        // Merge pages (numeric) + service (object)
        $data = [
            ...PageResource::collection($pages)->resolve(),
            'Services' => (object) $serviceObject,
        ];

        return response()->json([
            'data' => (object) $data,
        ]);


    }
}
