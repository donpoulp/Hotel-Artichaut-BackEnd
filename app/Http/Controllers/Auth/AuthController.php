<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'firstName' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'firstName' => $validatedData['firstName'],
            'lastName' => $request->input('lastName'),
            'email' => $validatedData['email'],
            'emailBis' => $request->input('emailBis'),
            'password' => $validatedData['password'],
            'phone' => $request->input('phone'),
            'phoneBis' => $request->input('phoneBis'),
            'is_admin' => $request->input('is_admin'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }


    public function actualUser(Request $request)
    {
        return $request->user();
    }
}
