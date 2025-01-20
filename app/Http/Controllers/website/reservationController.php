<?php

namespace App\Http\Controllers\website;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class reservationController extends Controller
{
    public function allReservation(): object{

        return response()->json(Reservation::all());
    }
    public function ReservationShowid(Request $request , string $id): object
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
                'startDate' => 'required|date|max:20',
                'endDate' => 'required|date|max:20',
                'user_id' => 'required',
            ]);


            $postReservation = new Reservation($validate);
            $postReservation->save();
            return response()->json($postReservation);
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
}
