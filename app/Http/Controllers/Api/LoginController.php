<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
class LoginController extends Controller
{
   

public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|unique:tbl_user,email',
        'mobile'   => 'nullable|string|max:20',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // ✅ bcrypt() hashes the password using Blowfish algorithm
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'mobile'   => $request->mobile,
        'password' => bcrypt($request->password), // 👈 using bcrypt directly
    ]);

    $token = $user->createToken('AuthToken')->plainTextToken;

    return response()->json([
        'status'  => true,
        'message' => 'User registered successfully.',
        'data'    => [
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer',
        ]
    ], 201);
}

public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'status'  => false,
            'message' => 'No user found with that email.',
        ], 404);
    }

    // ✅ password_verify checks the bcrypt hash directly
    if (!password_verify($request->password, $user->password)) {
        return response()->json([
            'status'  => false,
            'message' => 'Password mismatch.',
        ], 401);
    }

    $token = $user->createToken('AuthToken')->plainTextToken;

    return response()->json([
        'status'  => true,
        'message' => 'Login successful.',
        'data'    => [
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer',
        ],
    ]);
}
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }
}

