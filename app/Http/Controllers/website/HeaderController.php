<?php

namespace App\Http\Controllers\website;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Schema(
 *     schema="Header",
 *     type="object",
 *     title="Header",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="logo", type="string", example="logo.png"),
 *     @OA\Property(property="icone", type="string", example="icon.png"),
 *     @OA\Property(property="background_color_1", type="string", example="#ffffff"),
 *     @OA\Property(property="background_opacity_1", type="integer", example=80),
 *     @OA\Property(property="fondus_color_2", type="string", example="#000000"),
 *     @OA\Property(property="fondus_opacity_2", type="integer", example=50),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-04-24T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-04-24T12:00:00Z")
 * )
 */
class HeaderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/header",
     *     summary="Liste tous les headers avec leurs icônes",
     *     tags={"Header"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des headers",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Header"))
     *     )
     * )
     */
    public function allHeader(): object{
        $icon=Header::with('icon')->get();
        return response()->json($icon);
    }
    /**
     * @OA\Get(
     *     path="/api/header/{id}",
     *     summary="Afficher un header par ID",
     *     tags={"Header"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Header trouvé",
     *         @OA\JsonContent(ref="#/components/schemas/Header")
     *     )
     * )
     */
    public function headerShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $headerId = Header::findOrFail($id)]);

        return response()->json([$headerId]);
    }

    /**
     * @OA\Put(
     *     path="/api/header/{id}",
     *     summary="Mettre à jour un header",
     *     tags={"Header"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Header")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Header mis à jour",
     *         @OA\JsonContent(ref="#/components/schemas/Header")
     *     )
     * )
     */
    public function headerUpdate($id, Request $request)
    {
        $headerUpdate = $request->validate([
            'logo' => 'nullable',
            'icone' => 'nullable',
            'background_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity_1' => 'nullable|integer|between:0,100',
            'fondus_color_2' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'fondus_opacity_2' => 'nullable|integer|between:0,100',
        ]);

        $header = Header::findOrFail($id);
        $header->update($headerUpdate);

        return response()->json($headerUpdate);

    }
    /**
     * @OA\Post(
     *     path="/api/header",
     *     summary="Créer un nouveau header",
     *     tags={"Header"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Header")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Header créé",
     *         @OA\JsonContent(ref="#/components/schemas/Header")
     *     )
     * )
     */
    public function PostHeader(Request $request)
    {
        try {
            $validate = $request->validate([
                'logo' => 'nullable',
                'icone' => 'nullable',
                'background_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'background_opacity_1' => 'nullable|integer|between:0,100',
                'fondus_color_2' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'fondus_opacity_2' => 'nullable|integer|between:0,100',
            ]);


            $postHeader = new Header($validate);
            $postHeader->save();
            return response()->json($postHeader);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }
    /**
     * @OA\Delete(
     *     path="/api/header/{id}",
     *     summary="Supprimer un header",
     *     tags={"Header"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Header supprimé, retourne tous les headers restants",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Header"))
     *     )
     * )
     */
    public function DeleteHeader(Request $request, $id)
    {
        $deleteHeader = Header::findOrFail($id);
        $deleteHeader->delete();
        return response()->json(Header::all());
    }
}
