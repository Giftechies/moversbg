<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complication;
use Illuminate\Http\Request;

class ComplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $complications = Complication::all();
        return response()->json($complications);
    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $complication = Complication::find($id);
        if (!$complication) {
            return response()->json(['message' => 'Complication not found'], 404);
        }
        return response()->json($complication);
    }

}