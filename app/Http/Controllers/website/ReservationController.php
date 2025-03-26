<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\MailController;
use App\Models\Bedroom;
use App\Models\BedroomType;
use App\Models\Reservation;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class ReservationController extends Controller
{
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

    public function CalculPrice(Request $request)
    {
        try {
            $validated = $request->validate([
                'startDate' => 'nullable',
                'endDate' => 'nullable',
                'user_id' => 'nullable',
                'bedroom_type_id' => 'nullable',
                'service_id' => 'nullable|array',
                'service_id.*' => 'exists:services,id'
            ]);

            $startDate = Carbon::parse($validated['startDate']);
            $endDate = Carbon::parse($validated['endDate']);
            $price = BedroomType::findOrfail($validated['bedroom_type_id'])->price;

            $totalServicePrice = 0;

            if (isset($validated['service_id'])) {
                foreach ($validated['service_id'] as $serviceId) {
                    $service = Services::findOrfail($serviceId);
                    $totalServicePrice += $service->price;
                }
            }

            $days = $startDate->diffInDays($endDate);

            $bedroomPrice = ($price * $days) + $totalServicePrice;

            $postReservation = new Reservation($validated);
            $postReservation->save();

            return response()->json($bedroomPrice);

        } catch (ValidationException $e) {
            return response()->json($e->getMessage());
        }
    }

    public function checkBedroom(Request $request, string $id, string $userId)
    {
        try {
            $validated = $request->validate([
                'startDate' => 'nullable',
                'endDate' => 'nullable',
            ]);
        }catch (ValidationException $e) {
            return response()->json($e->getMessage());
        }

        $reservation = Reservation::where('bedroom_type_id' ,$id)
            ->where('startDate', '>=', $validated['startDate'])
            ->where('endDate','<=',$validated['endDate'])
            ->get();

        $bedroom = Bedroom::where('bedroom_type_id' ,$id)->get();
        if ($bedroom->count() == $reservation->count()) {
            return response()->json('pas de chambre dispo');
        }else{

            $newReservation = new Reservation($validated);
            $newReservation->user_id =$userId;
            $newReservation->bedroom_type_id =$id;
            $newReservation->startDate=$validated['startDate'];
            $newReservation->endDate=$validated['endDate'];
            $newReservation->save();

        }
        return response()->json($newReservation);

    }

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
