<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
{
    try {
        $request->validate([
            'phone' => 'required',
            'pin' => 'required'
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ]);
    }

    $user = User::where('phone', $request->phoneNumber)->first();

    if (!$user || !Hash::check($request->pin, $user->password)) {
        return response()->json([
            'message' => 'The provided credentials are incorrect.',
            'success' => false
        ]);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'success' => true,
        'token' => $token,
        'user' => $user
    ]);
}

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
            "message" => "Successfully sign out!"
        ]);
    }
}
