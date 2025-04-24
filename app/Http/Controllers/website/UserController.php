<?php

namespace App\Http\Controllers\website;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Tag(name="Utilisateurs", description="Gestion des utilisateurs")
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/user",
     *     tags={"Utilisateurs"},
     *     summary="Afficher tous les utilisateurs",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des utilisateurs"
     *     )
     * )
     */
    public function allUsers(): object {
        $users = User::with('reservation')->get();
        return response()->json($users);
    }

    /**
     * @OA\Get(
     *     path="api/user/{id}",
     *     tags={"Utilisateurs"},
     *     summary="Afficher un utilisateur par ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détails de l'utilisateur"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé"
     *     )
     * )
     */
    public function UserShowid(Request $request , string $id): object {
        $userId = User::findOrFail($id);
        return response()->json([$userId]);
    }

    /**
     * @OA\Put(
     *     path="api/user/{id}",
     *     tags={"Utilisateurs"},
     *     summary="Mettre à jour un utilisateur",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"firstName", "email", "password", "phone"},
     *             @OA\Property(property="firstName", type="string", maxLength=20),
     *             @OA\Property(property="lastName", type="string", maxLength=20),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="emailBis", type="string", format="email"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="phone", type="string"),
     *             @OA\Property(property="phoneBis", type="string"),
     *             @OA\Property(property="role", type="integer", minimum=0, maximum=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur mis à jour"
     *     )
     * )
     */
    public function UpdateUser($id, Request $request) {
        $updatecustomer = $request->validate([
            'firstName' => ['required', 'regex:/^[^<>{}]+$/', 'max:20'],
            'lastName' => ['nullable', 'regex:/^[^<>{}]+$/', 'max:20'],
            'email' => 'required|email:rfc,dns|max:70|unique:users,email',
            'emailBis' => 'nullable|email|max:70',
            'password' => 'required|string|min:8|max:20',
            'phone' => 'required|digits:10',
            'phoneBis' => 'nullable|digits:10',
            'role' => 'nullable|integer|between:0,2',
        ]);

        $user = User::findOrFail($id);
        $user->update($updatecustomer);

        return response()->json($updatecustomer);
    }

    /**
     * @OA\Post(
     *     path="api/user",
     *     tags={"Utilisateurs"},
     *     summary="Créer un nouvel utilisateur",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"firstName", "email", "password", "phone"},
     *             @OA\Property(property="firstName", type="string", maxLength=20),
     *             @OA\Property(property="lastName", type="string", maxLength=20),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="emailBis", type="string", format="email"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="phone", type="string"),
     *             @OA\Property(property="phoneBis", type="string"),
     *             @OA\Property(property="role", type="integer", minimum=0, maximum=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Utilisateur créé"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erreur de validation"
     *     )
     * )
     */
    public function PostUser(Request $request) {
        try {
            $validate = $request->validate([
                'firstName' => ['required', 'regex:/^[^<>{}]+$/', 'max:20'],
                'lastName' => ['nullable', 'regex:/^[^<>{}]+$/', 'max:20'],
                'email' => 'required|email:rfc,dns|max:70|unique:users,email',
                'emailBis' => 'nullable|email|max:70',
                'password' => 'required|string|min:8|max:20',
                'phone' => 'required|digits:10',
                'phoneBis' => 'nullable|digits:10',
                'role' => 'nullable|integer|between:0,2',
            ]);

            if (!isset($validate['role'])) {
                $validate['role'] = 0;
            }

            $postcustomer = new User($validate);
            $postcustomer->save();

            return response()->json($postcustomer, 201);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    /**
     * @OA\Delete(
     *     path="api/user/{id}",
     *     tags={"Utilisateurs"},
     *     summary="Supprimer un utilisateur",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur supprimé"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé"
     *     )
     * )
     */
    public function DeleteUser(Request $request, $id) {
        $deletecustomer = User::findOrFail($id);
        $deletecustomer->delete();
        return response()->json(User::all());
    }
}
