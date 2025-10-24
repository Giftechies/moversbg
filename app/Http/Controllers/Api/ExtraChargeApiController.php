<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExtraCharge;
use Illuminate\Http\Request;

class ExtraChargeApiController extends Controller
{
    /**
     * Return all or only enabled extra charges
     */
    public function index(Request $request)
    {
        $enabledOnly = $request->query('enabled', false);

        $charges = ExtraCharge::when($enabledOnly, function ($query) {
                $query->where('is_enabled', true);
            })
            ->get(['id', 'name', 'type', 'value', 'is_enabled']);

        return response()->json([
            'success' => true,
            'data' => $charges
        ]);
    }
}
