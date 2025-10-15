<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ComplicationRate;
use Illuminate\Http\Request;

class ComplicationRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $complicationRates = ComplicationRate::all();
        return response()->json($complicationRates);
    }

    public function getRatesByType($type)
    {        
        $rates = ComplicationRate::where('type', $type)->where('status', true)->get();
        return response()->json($rates);
    }
}