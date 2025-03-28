<?php

namespace App\Http\Controllers\website;

use App\Models\Bedroom;
use App\Models\BedroomType;
use App\Models\Reservation;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Traits\ReservationTrait;

class ReservationController extends Controller
{
    use ReservationTrait;
    public function allReservation(): object
    {
        $reservation = Reservation::with('services')->get();
        return response()->json($reservation);

    }

    public function ReservationShowid(Request $request, string $id): object
    {
        $validated = $request->validate([

            $ReservationId = Reservation::findOrFail($id)]);

        return response()->json([$ReservationId]);
    }

    public function UpdateReservation($id, Request $request)
    {
        $updateReservation = $request->validate([
            'startDate' => 'nullable',
            'endDate' => 'nullable',
        ]);

        $Reservation = Reservation::findOrFail($id);
        $Reservation->update($updateReservation);

        return response()->json($updateReservation);

    }

    public function PostReservation(Request $request)
    {
        try {
            $validate = $request->validate([
                'startDate' => 'required|date',
                'endDate' => 'required|date',
                'price' => 'required|numeric',
                'status_id' => 'required|numeric',
                'bedroom_type_id' => 'required',
                'user_id' => 'required|numeric',
                'services' => 'nullable|array',
            ]);

            if($this->checkBedroom($validate)){
                $startDate = explode("T", $validate['startDate']);
                $endDate = explode("T", $validate['endDate']);
                $validate['startDate'] = $startDate[0];
                $validate['endDate'] = $endDate[0];

                $newReservation = Reservation::create([
                    'startDate' => $validate['startDate'],
                    'endDate' => $validate['endDate'],
                    'price' => $validate['price'],
                    'status_id' => $validate['status_id'],
                    'bedroom_type_id' => $validate['bedroom_type_id'],
                    'user_id' => $validate['user_id'],
                ]);

                if (!empty($validate['services'])) {
                    $newReservation->services()->attach($validate['services']);
                }
                return response()->json([
                    'message' => 'Reservation créée avec succès',
                    'reservation' => $newReservation
                ], 201);

            }else{
                return response()->json("Aucune chambre de disponible pour le type de chambre selectionner", 406);
            }

        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage(), 400);
        }
    }

    public function DeleteReservation(Request $request, $id)
    {
        $deleteReservation = Reservation::findOrFail($id);
        $deleteReservation->delete();
        return response()->json(Reservation::all());
    }

    public function getReservationsByUserId(string $userId): \Illuminate\Http\JsonResponse
    {
        // Récupérer toutes les réservations associées à l'utilisateur avec l'ID donné
        $reservations = Reservation::with('services')
            ->where('user_id', $userId)
            ->get();

        return response()->json($reservations);
    }
}
