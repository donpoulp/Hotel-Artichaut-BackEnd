<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(Request $request){
        try {
            $validatedData = $request->validate([
                'firstName' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8',
            ], [
                'email.unique' => 'Cet email est déjà utilisé. Veuillez en choisir un autre.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
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
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);
        }catch (ValidationException $e) {
            return response()->json([
                'message' => 'Échec de l’inscription',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de l’inscription.',
            ], 500);
        }
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
