<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs (GET /api/faqs)
     */
    public function index(Request $request)
    {
        // Optional pagination or limit
        $perPage = $request->get('per_page', 10);

        $faqs = Faq::all();

        return response()->json([
            'success' => true, 
            'data' => $faqs,
        ], 200);
    }
 
}
