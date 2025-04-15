<?php

namespace Tests\Feature;

use App\Http\Controllers\website\ReservationController;
use App\Models\User;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    public function test_PostReservation(): void
    {
        $user = User::factory()->create();
        $reservationData = [
            'startDate' => '2023-12-01T00:00:00Z',
            'endDate' => '2023-12-10T00:00:00Z',
            'price' => 1000,
            'status_id' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
            'services' => [1, 2],
        ];

        $response = $this->post('/api/reservation', $reservationData);
        $response->assertStatus(201);

        $this->assertDatabaseHas('reservation', [
            'startDate' => '2023-12-01',
            'endDate' => '2023-12-10',
            'price' => 1000,
            'user_id' => $user->id,
        ]);
    }

    public function test_PostReservation_NoBedroomAvailable(): void
    {
        $user = User::factory()->create();
        $reservationData = [
            'startDate' => '2023-12-01T00:00:00Z',
            'endDate' => '2023-12-10T00:00:00Z',
            'price' => 1000,
            'status_id' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
        ];

        // mock method checkBedroom to return false
        $this->partialMock(ReservationController::class)
            ->shouldReceive('checkBedroom')
            ->andReturn(false);

        $response = $this->post('/api/reservation', $reservationData);
        $response->assertStatus(406);
    }
}
