<?php

namespace App\Http\Controllers\website;

use App\Models\Services;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Tag(name="Services", description="Gestion des services")
 */
class ServicesController extends Controller
{
    use PictureTrait;

    /**
     * @OA\Get(
     *     path="api/services",
     *     tags={"Services"},
     *     summary="Liste de tous les services",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des services"
     *     )
     * )
     */
    public function allServices(): object{
        $picture = Services::with('picture')->get();
        return response()->json($picture);
    }

    /**
     * @OA\Get(
     *     path="api/services/{id}",
     *     tags={"Services"},
     *     summary="Afficher un service par ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du service",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Détail du service")
     * )
     */
    public function ServicesShowid(string $id): object {
        $ServicesId = Services::findOrFail($id);
        return response()->json($ServicesId);
    }

    /**
     * @OA\Put(
     *     path="api/services/{id}",
     *     tags={"Services"},
     *     summary="Modifier un service existant",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du service",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nameFr", type="string", example="Massage détente"),
     *             @OA\Property(property="descriptionFr", type="string", example="Massage complet du corps..."),
     *             @OA\Property(property="price", type="number", example="49.99")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Service mis à jour")
     * )
     */
    public function UpdateServices($id, Request $request) {
        $updateServices = $request->validate([
            // validations (comme dans ton code)
        ]);

        $Services = Services::findOrFail($id);
        // logique mise à jour image + data
        $Services->update($updateServices);
        return response()->json($updateServices);
    }

    /**
     * @OA\Post(
     *     path="api/services",
     *     tags={"Services"},
     *     summary="Créer un nouveau service",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nameEn", type="string", example="Deep Tissue Massage"),
     *             @OA\Property(property="price", type="number", example="59.99")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Service créé")
     * )
     */
    public function PostServices(Request $request) {
        try {
            $validate = $request->validate([
                // validations
            ]);

            $postServices = new Services($validate);
            $postServices->save();
            return response()->json($postServices, 201);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *     path="api/services/{id}",
     *     tags={"Services"},
     *     summary="Supprimer un service",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du service à supprimer",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Service supprimé")
     * )
     */
    public function DeleteServices(Request $request, $id) {
        $deleteServices = Services::findOrFail($id);
        $deleteServices->delete();
        return response()->json(Services::all());
    }
}
