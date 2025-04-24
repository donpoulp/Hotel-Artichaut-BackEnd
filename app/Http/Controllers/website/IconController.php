<?php

namespace App\Http\Controllers\website;

use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class IconController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/icons",
     *     summary="Liste toutes les icônes",
     *     tags={"Icons"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des icônes",
     *     )
     * )
     */
    public function allIcon(): object
    {
        $icon = Icon::all();
        return response()->json($icon);
    }

    /**
     * @OA\Get(
     *     path="/api/icons/{id}",
     *     summary="Affiche une icône par ID",
     *     tags={"Icons"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Icône trouvée",
     *     ),
     *     @OA\Response(response=404, description="Icône non trouvée")
     * )
     */
    public function iconShowid(Request $request , string $id): object
    {
        $validated = $request->validate([
            $iconId = Icon::findOrFail($id)]);

        return response()->json([$iconId]);
    }

    /**
     * @OA\Put(
     *     path="/api/icons/{id}",
     *     summary="Met à jour une icône",
     *     tags={"Icons"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Icône mise à jour",
     *     )
     * )
     */
    public function iconUpdate($id, Request $request)
    {
        $iconUpdate = $request->validate([
            'name' => 'nullable|string|regex:/^[^<>{}]+$/|max:100',
            'iconPath' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'footer_id' => 'nullable|integer',
            'header_id' => 'nullable|integer',
            'bedroomtype_id' => 'nullable|integer',
            'strongestype_id' => 'nullable|integer',
        ]);

        $icon = Icon::findOrFail($id);
        $icon->update($iconUpdate);

        return response()->json($iconUpdate);
    }

    /**
     * @OA\Post(
     *     path="/api/icons",
     *     summary="Crée une nouvelle icône",
     *     tags={"Icons"},
     *     @OA\RequestBody(
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Icône créée",
     *     )
     * )
     */
    public function postIcon(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'nullable|string|regex:/^[^<>{}]+$/|max:100',
                'iconPath' => 'nullable|string|max:255',
                'link' => 'nullable|url|max:255',
                'footer_id' => 'nullable|integer',
                'header_id' => 'nullable|integer',
                'bedroomtype_id' => 'nullable|integer',
                'strongestype_id' => 'nullable|integer',
            ]);

            $postIcon = new Icon($validate); // Correction : c’était News au lieu de Icon
            $postIcon->save();
            return response()->json($postIcon);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/icons/{id}",
     *     summary="Supprime une icône",
     *     tags={"Icons"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Icône supprimée, retourne la liste restante",
     *     )
     * )
     */
    public function deleteIcon(Request $request, $id)
    {
        $deleteIcon = Icon::findOrFail($id);
        $deleteIcon->delete();
        return response()->json(Icon::all());
    }
}
