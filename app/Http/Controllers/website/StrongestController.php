<?php

namespace App\Http\Controllers\website;

use App\Models\Strongest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Tag(name="Strongest", description="Gestion des éléments Strongest")
 */
class StrongestController
{
    /**
     * @OA\Get(
     *     path="api/strongest",
     *     tags={"Strongest"},
     *     summary="Afficher tous les éléments Strongest",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des éléments Strongest"
     *     )
     * )
     */
    public function allStrongest(): object {
        $icons = Strongest::with('icon')->get();
        return response()->json($icons);
    }

    /**
     * @OA\Get(
     *     path="api/strongest/{id}",
     *     tags={"Strongest"},
     *     summary="Afficher un élément Strongest par ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détails de l'élément Strongest"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Élément non trouvé"
     *     )
     * )
     */
    public function StrongestShowid($id): object {
        $strongestId = Strongest::findOrFail($id);
        return response()->json($strongestId);
    }

    /**
     * @OA\Put(
     *     path="api/strongest/{id}",
     *     tags={"Strongest"},
     *     summary="Mettre à jour un élément Strongest",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="background_color_1", type="string", example="#FF0000"),
     *             @OA\Property(property="background_opacity_1", type="integer", example=80),
     *             @OA\Property(property="background_color_2", type="string", example="#00FF00"),
     *             @OA\Property(property="background_opacity_2", type="integer", example=60)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Élément Strongest mis à jour"
     *     )
     * )
     */
    public function UpdateStrongest($id, Request $request) {
        $updatestrongest = $request->validate([
            'background_color_1'   => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity_1' => 'nullable|integer|between:0,100',
            'background_color_2'   => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity_2' => 'nullable|integer|between:0,100',
        ]);

        $strongest = Strongest::findOrFail($id);
        $strongest->update($updatestrongest);

        return response()->json($updatestrongest);
    }

    /**
     * @OA\Post(
     *     path="api/strongest",
     *     tags={"Strongest"},
     *     summary="Créer un élément Strongest",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="background_color_1", type="string", example="#FF0000"),
     *             @OA\Property(property="background_opacity_1", type="integer", example=80),
     *             @OA\Property(property="background_color_2", type="string", example="#00FF00"),
     *             @OA\Property(property="background_opacity_2", type="integer", example=60)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Élément Strongest créé"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erreur de validation"
     *     )
     * )
     */
    public function PostStrongest(Request $request) {
        try {
            $validate = $request->validate([
                'background_color_1'   => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'background_opacity_1' => 'nullable|integer|between:0,100',
                'background_color_2'   => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'background_opacity_2' => 'nullable|integer|between:0,100',
            ]);

            $poststrongest = new Strongest($validate);
            $poststrongest->save();
            return response()->json($poststrongest);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *     path="api/strongest/{id}",
     *     tags={"Strongest"},
     *     summary="Supprimer un élément Strongest",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Élément supprimé"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Élément non trouvé"
     *     )
     * )
     */
    public function DeleteStrongest(Request $request, $id) {
        $deleteStrongest = Strongest::findOrFail($id);
        $deleteStrongest->delete();
        return response()->json(Strongest::all());
    }
}
