<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $user = Utilisateur::where('uti_email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->uti_password)) {
            return response([
                'message' => ['Wrong user or password']
            ], 404);
        }


        $token = $user->createToken(Str::random(10))->plainTextToken;
        return response()->json([
            'token' => $token,
            'status' => 'success'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Succesfull Logged out'
        ]);
    }
}
