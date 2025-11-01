<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceApiController extends Controller
{
    /**
     * GET /api/services
     * Fetch all services
     */
    public function index()
    {
        $services = Service::latest()->get()->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'description' => $service->description,
                'image' => $service->image ? asset($service->image) : null,
                'status' => (bool) $service->status,
                'created_at' => $service->created_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'success' => true,
            'count' => $services->count(),
            'data' => $services,
        ], 200);
    }

    /**
     * GET /api/services/{slug}
     * Fetch a single service by slug or ID
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->orWhere('id', $slug)
            ->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'description' => $service->description,
                'image' => $service->image ? asset($service->image) : null,
                'status' => (bool) $service->status,
                'created_at' => $service->created_at->format('Y-m-d H:i:s'),
            ]
        ], 200);
    }
}
