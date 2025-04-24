<?php

namespace App\Http\Controllers\website;

use App\Models\Status;
use Illuminate\Routing\Controller;

/**
 * @OA\Tag(name="Status", description="Gestion des statuts")
 */
class StatusController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/status",
     *     tags={"Status"},
     *     summary="Récupérer tous les statuts",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des statuts"
     *     )
     * )
     */
    public function allStatuses(): object
    {
        return response()->json(Status::all());
    }
}
