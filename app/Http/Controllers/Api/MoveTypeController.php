<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MoveType;
use Illuminate\Http\Request;

class MoveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $moveTypes = MoveType::all();
        return response()->json($moveTypes);
    }
}
