<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        }

        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'dob' =>'required|date|before:'.Carbon::now()->subYears(18),
        'password' => 'required|string|confirmed|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $user = \App\Models\User::create([
        'name' => $request->name,
        'lname' => $request->lname,
        'dob' =>$request->dob,  
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
        'message' => 'User created successfully',
        'access_token' => $token,
    ], 201);
    }
}
