<?php

namespace App\Http\Controllers\website;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{
    /**
}
* @OA\Get(
*     path="/api/hotel",
*     summary="Récupère tous les hôtels",
*     tags={"Hotels"},
*     @OA\Response(
 *         response=200,
 *         description="Liste des hôtels",
*     )
 * )
 */
public function allHotel(): object {
    return response()->json(Hotel::all());
}

/**
 * @OA\Get(
 *     path="/api/hotel/{id}",
 *     summary="Récupère un hôtel par son ID",
 *     tags={"Hotels"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID de l'hôtel",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Hôtel trouvé",
 *     )
 * )
 */
public function hotelShowid(Request $request, string $id): object {
    $validated = $request->validate([
        // Cette ligne n'a pas d'effet ici
        $hotelId = Hotel::findOrFail($id)
    ]);

    return response()->json([$hotelId]);
}

/**
 * @OA\Put(
 *     path="/api/hotel/{id}",
 *     summary="Met à jour un hôtel",
 *     tags={"Hotels"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Hôtel mis à jour",
 *     )
 * )
 */
public function hotelUpdate($id, Request $request) {
    $hotelUpdate = $request->validate([
        'name' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
        'address' => 'nullable|string|regex:/^[^<>{}]+$/|max:500',
        'description' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
        'phone' => 'nullable|string|regex:/^\+?\d{10,15}$/',
        'email' => 'nullable|email|max:255',
        'postalCode' => 'nullable|string|regex:/^\d{5,10}$/',
    ]);

    $hotel = Hotel::findOrFail($id);
    $hotel->update($hotelUpdate);

    return response()->json($hotelUpdate);
}

/**
 * @OA\Post(
 *     path="/api/hotel",
 *     summary="Crée un nouvel hôtel",
 *     tags={"Hotels"},
 *     @OA\RequestBody(
 *         required=true,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Hôtel créé",
 *     )
 * )
 */
public function PostHotel(Request $request) {
    try {
        $validate = $request->validate([
            'name' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
            'address' => 'nullable|string|regex:/^[^<>{}]+$/|max:500',
            'description' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
            'phone' => 'nullable|string|regex:/^\+?\d{10,15}$/',
            'email' => 'nullable|email|max:255',
            'postalCode' => 'nullable|string|regex:/^\d{5,10}$/',
        ]);

        $postHotel = new Hotel($validate);
        $postHotel->save();
        return response()->json($postHotel);
    } catch (ValidationException $exception) {
        return response()->json($exception->getMessage());
    }
}

/**
 * @OA\Delete(
 *     path="/api/hotel/{id}",
 *     summary="Supprime un hôtel",
 *     tags={"Hotels"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Hôtel supprimé, liste restante retournée",
 *     )
 * )
 */
public function DeleteHotel(Request $request, $id) {
    $deleteHotel = Hotel::findOrFail($id);
    $deleteHotel->delete();
    return response()->json(Hotel::all());
}
}
