<?php

namespace App\Http\Controllers\website;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;


class ReservationController extends Controller
{
    public function allReservation(): object{
        $reservation = Reservation::with('services')->get();
        return response()->json($reservation);

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
//    public function Test(Request $request){
//
//        $bedroom = Bedroom::all();
//        $reservation = Reservation::all();
//        $startReservation = Reservation::all()->pluck('startDate');
//        $endReservation = Reservation::all()->pluck('endDate');
//
//        try {
//            $validated = $request->validate([
//                'startDate' => 'nullable',
//                'endDate' => 'nullable',
//            ]);
//
//            foreach ($startReservation as $reservationList) {
//            if($startReservation->contains($reservationList)){
//                return response()->json('error');
//
//            }elseif ($endReservation->contains($reservationList)){
//                return response()->json('error');
//
//            }
//
//            }
//
//            $postReservation = new Reservation($validated);
//            $postReservation->save();
//            return response()->json($postReservation);
//
//        }catch (ValidationException $e){
//            return response()->json($e->getMessage());
//        }
//    }

    public function PostReservation(Request $request)
    {

        try {
            $validate = $request->validate([
                'startDate' => 'required|date|max:20',
                'endDate' => 'required|date|max:20',
                'user_id' => 'required',
            ]);

            if ( $validate['startDate'] > $validate['endDate']
                ||
                $validate['startDate'] = $validate['endDate']
            ){
                $message = "Date Invalide";
                return response()->json($message);
            }

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
