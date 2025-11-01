<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BusinessApiController extends Controller
{
    public function registerManagerAndBusiness(Request $request)
    {
        

         $validator = Validator::make($request->all(), [
                  'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:tbl_user,email',
            'user_password' => 'required|min:6',
            'mobile' => 'nullable|string',
            'business_name' => 'required|string|max:255', 
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            } 
         // Create Business tied to the user
        $business = Business::create([
            'name' => $request->business_name,
            'email' => $request->user_email, 
            'mobile' => $request->mobile, 
        ]);

        // Create User as Manager
        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
            'mobile' => $request->mobile,
            'business_id' => $business->id,
            'role' => 'business',
        ]);
        $token = $user->createToken('auth_token')->plainTextToken; 
 
        return response()->json([
            'message' => 'Business and Manager created successfully.',
            'user' => $user,
            'business' => $business,
             'access_token' => $token,
                'token_type' => 'Bearer',
        ], 201);
    }
}

