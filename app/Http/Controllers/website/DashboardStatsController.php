<?php

namespace App\Http\Controllers\website;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
class DashboardStatsController
{
    public function reservationsPerMonth()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');

        $endOfMonth = Carbon::now()->format('Y-m-d');

        $stats = Reservation::selectRaw('DATE(startDate) as date, COUNT(*) as count')
            ->whereBetween('startDate', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $users = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $statsFormatted = $stats->map(function ($item) {
            $item->date = Carbon::parse($item->date)->format('Y-m-d');
            return $item;
        });

        $usersFormatted = $users->map(function ($item) {
            $item->date = Carbon::parse($item->date)->format('Y-m-d');
            return $item;
        });

        return response()->json([
            'reservations' => $statsFormatted,
            'users' => $usersFormatted
        ]);
    }
}
