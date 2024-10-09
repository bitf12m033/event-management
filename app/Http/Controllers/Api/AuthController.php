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
            'phone' => 'required|exists:users,phone',
            'pin' => 'required'
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ]);
    }

    $user = User::where('phone', $request->phone)->first();

    if (!$user || !Hash::check($request->pin,$user->password)) {
        return response()->json([
            'message' => $user,
            'errors' => ["pin" => ["The provided pin is incorrect."]],
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
    public function forgetPin(Request $request){
         try {
                $request->validate([
                            'phone' => [
                                'required',
                                function ($attribute, $value, $fail) {
                                    if (!User::where('phone', $value)->exists()) {
                                        $fail('Record not found.');
                                    }
                                },
                            ],
                        ]);
            } catch (ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ]);
            }

  $user = User::where('phone', $request->phone)->first();

    // Generate a random PIN reset token
//     $resetToken = rand(100000, 999999);

    // Save the reset token to the user or a separate table
    $user->reset_token = '1234';
    $user->save();
    return response()->json([
        'success' => true,
        'message' => 'A reset code has been sent to your phone.'
    ]);


    }
    public function verifyOtp(Request $request){
        try {
            $request->validate([
               'otp' =>'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'success' => false,
               'message' => 'Validation failed',
                'errors' => $e->errors()
            ]);
        }
        $user = User::where('phone', $request->phone)->where('reset_token', $request->otp)->first();
        if (!$user) {
            return response()->json([
               'success' => false,
               'errors' => [['otp'=> 'Invalid otp.']]
            ]);
        }
        $user->reset_token = null;
        $user->save();
        return response()->json([
           'success' => true,
           'message' => 'Reset code verified.'
        ]);
    }


    public function resetPin(Request $request){
        try {
            $request->validate([
               'phone' =>'required',
               'pin' =>'required|min:4',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'success' => false,
               'message' => 'Validation failed',
                'errors' => $e->errors()
            ]);
        }
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return response()->json([
               'success' => false,
               'errors' => [['phone'=> 'Record not found.']]
            ]);
        }
        $user->password = Hash::make($request->pin);
        $user->save();
        return response()->json([
           'success' => true,
           'message' => 'Pin reset successful.'
        ]);
    }
}
