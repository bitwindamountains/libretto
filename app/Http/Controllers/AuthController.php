<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $existingToken = $user->tokens()->latest()->first();
        $isExpired = $existingToken && $existingToken->created_at->lte(now()->subMinutes(config('sanctum.expiration')));

        if ($isExpired || !$existingToken) {
            $user->tokens()->delete();
            $token = $user->createToken('libretto-token')->plainTextToken;
        } else {
            $token = $existingToken->plainTextToken;
        }

        return response()->json(['token' => $token]);
    }
    public function logout(Request $request)
{
    $request->user()->tokens()->delete();

    return response()->json(['message' => 'Logged out successfully']);
}

}
