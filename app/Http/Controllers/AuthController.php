<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json([
                'status' => true,
                'data' => [
                    'token' => $token
                ],
                'message' => 'Login berhasil'
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Login gagal'
        ]);
    }
}
