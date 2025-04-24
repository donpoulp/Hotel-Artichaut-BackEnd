<?php

namespace App\Http\Controllers\website;

use App\Models\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * @OA\Schema(
 *     schema="Bedroom",
 *     type="object",
 *     title="Bedroom",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="number", type="string", example="A101"),
 *     @OA\Property(property="bedroom_type_id", type="integer", example=2),
 *     @OA\Property(
 *         property="bedroom_type",
 *         type="object",
 *         @OA\Property(property="id", type="integer", example=2),
 *         @OA\Property(property="name", type="string", example="Suite")
 *     ),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-04-24T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-04-24T12:00:00Z")
 * )
 */
class BedroomController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/bedroom",
     *     summary="Liste des chambres avec type",
     *     tags={"Bedroom"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des chambres",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Bedroom"))
     *     )
     * )
     */
    public function allBedroom(): object{
        $picture = Bedroom::with('bedroom_type')->get();
        return response()->json($picture);
    }
    /**
     * @OA\Get(
     *     path="/api/bedroom/{id}",
     *     summary="Afficher une chambre par ID",
     *     tags={"Bedroom"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Chambre trouvée",
     *         @OA\JsonContent(ref="#/components/schemas/Bedroom")
     *     )
     * )
     */
    public function bedroomShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $bedroomId = Bedroom::findOrFail($id)]);

        return response()->json($bedroomId);
    }
    /**
     * @OA\Put(
     *     path="/api/bedroom/{id}",
     *     summary="Mettre à jour une chambre",
     *     tags={"Bedroom"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"number", "bedroom_type_id"},
     *             @OA\Property(property="number", type="string", example="B202"),
     *             @OA\Property(property="bedroom_type_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Chambre mise à jour",
     *         @OA\JsonContent(ref="#/components/schemas/Bedroom")
     *     )
     * )
     */
    public function UpdateBedroom($id, Request $request)
    {
        $updatebedroom = $request->validate([
            'number' => 'required|string|unique:bedroom|max:255',
            'bedroom_type_id' => 'required|integer|exists:bedroom_type,id',
        ]);

        $bedroom = Bedroom::findOrFail($id);
        $bedroom->update($updatebedroom);

        return response()->json($updatebedroom);

    }
    /**
     * @OA\Post(
     *     path="/api/bedroom",
     *     summary="Créer une chambre",
     *     tags={"Bedroom"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"number", "bedroom_type_id"},
     *             @OA\Property(property="number", type="string", example="B202"),
     *             @OA\Property(property="bedroom_type_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Chambre créée",
     *         @OA\JsonContent(ref="#/components/schemas/Bedroom")
     *     )
     * )
     */
    public function PostBedroom(Request $request)
    {
        $validate = $request->validate([
            'number' => 'required|string|unique:bedroom|max:255',
            'bedroom_type_id' => 'required|integer|exists:bedroom_type,id',
        ]);

        $postBedroom = new Bedroom($validate);
        $postBedroom->save();
        return response()->json($postBedroom);
    }


    /**
     * @OA\Delete(
     *     path="/api/bedroom/{id}",
     *     summary="Supprimer une chambre",
     *     tags={"Bedroom"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Chambre supprimée, retourne la liste restante",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Bedroom"))
     *     )
     * )
     */
    public function DeleteBedroom(Request $request, $id)
    {
        $deleteBedroom = Bedroom::findOrFail($id);
        $deleteBedroom->delete();
        return response()->json(Bedroom::all());
    }
}
