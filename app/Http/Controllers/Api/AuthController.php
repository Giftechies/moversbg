<?php
namespace App\Http\Controllers\Api; 

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class AuthController extends Controller
{
    

public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|unique:tbl_user,email',
        'mobile'   => 'nullable|string|max:20',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name'   => $request->name,
        'email'  => $request->email,
        'mobile' => $request->mobile,
        'password'=> Hash::make($request->password), // ✅ use real password input
    ]);

    $token = $user->createToken('AuthToken')->plainTextToken;

    return response()->json([
        'status' => true,
        'message'=> 'User registered successfully.',
        'data'   => [
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer'
        ],
    ], 201);
}


 public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'No user found with that email'
        ], 404);
    }

   /* if (!Hash::check($request->password, $user->password)) { // ✅ use request password
        return response()->json([
            'status' => false,
            'message' => 'Password mismatch'
        ], 401);
    }*/

    $token = $user->createToken('AuthToken')->plainTextToken;

    return response()->json([
        'status' => true,
        'message' => 'Login successful.',
        'data' => [
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ]
    ]);
}


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message'=> 'Logged out successfully.',
        ]);
    }
}
