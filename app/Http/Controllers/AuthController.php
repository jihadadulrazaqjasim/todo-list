<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        User::create($request->validated());

        return jsonResponse(201, data: $request->validated());
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! auth()->attempt($credentials)) {
            throw new AuthorizationException('Unauthorized');
        }

        $user = auth()->user();

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::logout();

        return response()->json(['message' => 'Logged out']);
    }
}
