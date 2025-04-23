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
                'firstName' => 'required|string|min:2|max:50|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email:rfc,dns|unique:users,email|max:100',
                'password' => 'required|string|min:8|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
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
                'is_admin' => $request->input('is_admin') ?? 0,
            ]);

            return response()->json([
                'message' => 'Enregistrement réussie',
                'user' => $user,
            ], 201);
        }catch (ValidationException $e) {
            return response()->json([
                'message' => 'Échec de l’inscription',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de l’inscription.' . $e,
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|max:100',
            'password' => 'required|string|min:8|max:64',
        ]);

        if (!Auth::attempt($validated)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        $user = User::where('email', $validated['email'])->firstOrFail();

        return response()->json([
            'message' => 'Authentification réussie',
            'user' => $user
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
