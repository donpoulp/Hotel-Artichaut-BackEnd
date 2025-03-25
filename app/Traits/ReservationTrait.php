<?php

namespace App\Traits;

use App\Models\Bedroom;
use App\Models\Reservation;
use Exception;

trait ReservationTrait
{
    public function checkBedroom(Array $validated)
    {
        try {
            $startDate = explode("T", $validated['startDate']);
            $endDate = explode("T", $validated['endDate']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid date format'], 400);
        }

        $reservation = Reservation::where('bedroom_type_id', $validated['bedroom_type_id'])
            ->where('startDate', '>=', $startDate[0])
            ->where('endDate', '<=', $endDate[0])
            ->get();

        $bedroom = Bedroom::where('bedroom_type_id', $validated['bedroom_type_id'])->get();

        if ($bedroom->count() == $reservation->count()) {
            return false;
        } else {
            return true;
        }
    }
}
