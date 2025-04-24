<?php

namespace App\Http\Controllers\website;

use App\Models\StrongestSection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Tag(name="StrongestSection", description="Gestion des sections Strongest")
 */
class StrongestSectionController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/strongest_section",
     *     tags={"StrongestSection"},
     *     summary="Récupère toutes les sections Strongest",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des sections Strongest"
     *     )
     * )
     */
    public function allStrongestSection(): object {
        return response()->json(StrongestSection::all());
    }

    /**
     * @OA\Get(
     *     path="api/strongest_section/{id}",
     *     tags={"StrongestSection"},
     *     summary="Afficher une section Strongest par ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détails de la section"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Section non trouvée"
     *     )
     * )
     */
    public function StrongestSectionShowid(Request $request, string $id): object {
        $strongestId = StrongestSection::findOrFail($id);
        return response()->json([$strongestId]);
    }

    /**
     * @OA\Put(
     *     path="api/strongest_section/{id}",
     *     tags={"StrongestSection"},
     *     summary="Mettre à jour une section Strongest",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="icon", type="string", example="icon-class"),
     *             @OA\Property(property="textEn", type="string", example="English description"),
     *             @OA\Property(property="textFr", type="string", example="Description française")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Section mise à jour"
     *     )
     * )
     */
    public function UpdateStrongestSection($id, Request $request) {
        $updatestrongest = $request->validate([
            'icon' => ['nullable', 'string', 'max:100'],
            'textEn' => ['nullable', 'string', 'max:500', 'regex:/^[^<>{}]+$/'],
            'textFr' => ['nullable', 'string', 'max:500', 'regex:/^[^<>{}]+$/'],
        ]);

        $strongest = StrongestSection::findOrFail($id);
        $strongest->update($updatestrongest);

        return response()->json($updatestrongest);
    }

    /**
     * @OA\Post(
     *     path="api/strongest_section",
     *     tags={"StrongestSection"},
     *     summary="Créer une nouvelle section Strongest",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="icon", type="string", example="icon-class"),
     *             @OA\Property(property="textEn", type="string", example="English description"),
     *             @OA\Property(property="textFr", type="string", example="Description française")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Section créée"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erreur de validation"
     *     )
     * )
     */
    public function PostStrongestSection(Request $request) {
        try {
            $validate = $request->validate([
                'icon' => ['nullable', 'string', 'max:100'],
                'textEn' => ['nullable', 'string', 'max:500', 'regex:/^[^<>{}]+$/'],
                'textFr' => ['nullable', 'string', 'max:500', 'regex:/^[^<>{}]+$/'],
            ]);

            $poststrongest = new StrongestSection($validate);
            $poststrongest->save();
            return response()->json($poststrongest, 201);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage(), 422);
        }
    }

    /**
     * @OA\Delete(
     *     path="api/strongest_section/{id}",
     *     tags={"StrongestSection"},
     *     summary="Supprimer une section Strongest",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Section supprimée"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Section non trouvée"
     *     )
     * )
     */
    public function DeleteStrongestSection(Request $request, $id) {
        $deleteStrongest = StrongestSection::findOrFail($id);
        $deleteStrongest->delete();
        return response()->json(StrongestSection::all());
    }
}
