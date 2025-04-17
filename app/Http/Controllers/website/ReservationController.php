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
        $reservation = Reservation::with('services', 'bedroomType')->get();
        return response()->json($reservation);

    }

    public function ReservationShowid(Request $request, string $id): object
    {
        $reservation = Reservation::with('services')->findOrFail($id);

        return response()->json([$reservation]);
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

    public function UpdateReservationFromBo($id, Request $request)
    {
        try {
            $validate = $request->validate([
                'bedroom_type_id' => 'required|integer|exists:bedroom_types,id',
                'user_id' => 'required|integer|exists:users,id',
                'services' => 'nullable|array',
                'services.*' => 'integer|exists:services,id',
                'startDate' => 'required|date|after_or_equal:today',
                'endDate' => 'required|date|after:startDate',
                'state' => 'required|integer|between:0,5',
            ]);

            $reservation = Reservation::findOrFail($id);

            if($this->checkBedroom($validate)){
                $price = $this->checkPrice($validate['bedroom_type_id'], $validate['services']);

                $reservation ->update([
                    'startDate' => $validate['startDate'],
                    'endDate' => $validate['endDate'],
                    'price' => $price,
                    'status_id' => $validate['state'],
                    'bedroom_type_id' => $validate['bedroom_type_id'],
                    'user_id' => $validate['user_id'],
                ]);

                if (!empty($validate['services'])) {
                    $serviceIds = Services::whereIn('nameEn', $validate['services'])
                        ->orWhereIn('nameFr', $validate['services'])
                        ->pluck('id')->toArray();

                    $reservation->services()->sync($serviceIds);
                }else{
                    $reservation->services()->detach();
                }
                return response()->json(['message' => 'Reservation mise a jour avec succes']);
            }else{
                return response()->json("Aucune chambre de disponible pour le type de chambre selectionner");
            }
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function PostReservation(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validate = $request->validate([
                'startDate' => 'required',
                'endDate' => 'required',
                'price' => 'required|numeric|min:0',
                'status_id' => 'required|integer',
                'bedroom_type_id' => 'required|integer',
                'user_id' => 'required|integer',
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

    public function PostReservationFromBo(Request $request){
        try {
            $validate = $request->validate([
                'bedroom_type_id' => 'required|integer|exists:bedroom_types,id',
                'user_id' => 'required|integer|exists:users,id',
                'services' => 'nullable|array',
                'services.*' => 'integer|exists:services,id',
                'startDate' => 'required|date|after_or_equal:today',
                'endDate' => 'required|date|after:startDate',
                'state' => 'required|integer|between:0,5',
            ]);

            if($this->checkBedroom($validate)){
                $price = $this->checkPrice($validate['bedroom_type_id'], $validate['services']);

                $newReservation = Reservation::create([
                    'startDate' => $validate['startDate'],
                    'endDate' => $validate['endDate'],
                    'price' => $price,
                    'status_id' => $validate['state'],
                    'bedroom_type_id' => $validate['bedroom_type_id'],
                    'user_id' => $validate['user_id'],
                ]);

                if (!empty($validate['services'])) {
                    $serviceIds = Services::whereIn('nameEn', $validate['services'])
                        ->orWhereIn('nameFr', $validate['services'])
                        ->pluck('id')->toArray();

                    $newReservation->services()->attach($serviceIds);
                }
                return response()->json(['message' => 'Reservation crée avec succes'], 201);
            } else {
                return response()->json("Aucune chambre de disponible pour le type de chambre selectionner");
            }

        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
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

    public function getAllReservationsByUserId($user_id): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::with(['services', 'bedroomType'])->where('user_id', $user_id)->get();

        return response()->json($reservation);
    }
}
