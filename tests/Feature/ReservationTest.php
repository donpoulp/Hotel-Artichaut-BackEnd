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
            'startDate' => '2023-12-10T00:00:00Z',
            'endDate' => '2023-12-20T00:00:00Z',
            'price' => 1000,
            'status_id' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
            'services' => [1, 2]
        ];

        $response = $this->post('/api/reservation', $reservationData);
        $response->assertStatus(201);

        $this->assertDatabaseHas('reservation', [
            'startDate' => '2023-12-10',
            'endDate' => '2023-12-20',
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

    public function test_PostReservationFromBo(): void
    {
        $user = User::factory()->create();
        $reservationData = [
            'startDate' => '2025-12-10T00:00:00Z',
            'endDate' => '2025-12-20T00:00:00Z',
            'price' => 3000,
            'status_id' => '3',
            'bedroom_type_id' => '3',
            'user_id' => $user->id,
            'services' => [4, 5],
            'state' => '3'
        ];

        $response = $this->post('/api/reservation-from-bo', $reservationData);
        $response->assertStatus(201);
        $response->assertJson(['message' => 'Reservation crée avec succes']);

        $this->assertDatabaseHas('reservation', [
            'startDate' => '2025-12-10',
            'endDate' => '2025-12-20',
            'status_id' => '3',
            'bedroom_type_id' => '3',
            'user_id' => $user->id,
        ]);
    }

    public function test_UpdateReservation(): void
    {
        $user = User::factory()->create();
        $reservationData = [
            'startDate' => '2024-12-10T00:00:00Z',
            'endDate' => '2024-12-20T00:00:00Z',
            'price' => 1000,
            'status_id' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
            'services' => [1, 2],
        ];
        $response = $this->post('/api/reservation', $reservationData);
        $response->assertStatus(201);
        $responseData = $response->json();
        $reservationId = $responseData['reservation']['id'];

        $updateData = [
            'startDate' => '2024-12-15',
            'endDate' => '2024-12-20',
        ];

        $response = $this->put("/api/reservation/$reservationId", $updateData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('reservation', [
            'id' => $reservationId,
            'startDate' => '2024-12-15',
            'endDate' => '2024-12-20',
        ]);
    }

    public function test_UpdateReservationFromBo(): void
    {
        $user = User::factory()->create();
        $reservationData = [
            'startDate' => '2024-10-10T00:00:00Z',
            'endDate' => '2024-10-20T00:00:00Z',
            'price' => 1000,
            'status_id' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
            'services' => [1, 2]
        ];
        $response = $this->post('/api/reservation', $reservationData);
        $response->assertStatus(201);
        $responseData = $response->json();
        $reservationId = $responseData['reservation']['id'];

        $updateData = [
            'startDate' => '2024-10-15',
            'endDate' => '2024-10-20',
            'state' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
            'services' => [1, 2],
        ];
        $response = $this->put("/api/reservation-from-bo/$reservationId", $updateData);
        $response->assertStatus(200);

        $this->assertDatabaseHas('reservation', [
            'id' => $reservationId,
            'startDate' => '2024-10-15',
            'endDate' => '2024-10-20',
            'status_id' => '3',
            'bedroom_type_id' => '1',
            'user_id' => $user->id,
        ]);
    }

    public function test_GetAllReservation(): void
    {
        $response = $this->get('/api/reservation');
        $response->assertStatus(200);
    }

    public function test_GetOneReservation(): void
    {
        $response = $this->get('/api/reservation/1');
        $response->assertStatus(200);
    }

    public function test_DeleteReservation(): void
    {
        $user = User::factory()->create();
        $reservationData = [
            'startDate' => '2024-9-10T00:00:00Z',
            'endDate' => '2024-9-20T00:00:00Z',
            'price' => 5000,
            'status_id' => '3',
            'bedroom_type_id' => '2',
            'user_id' => $user->id,
            'services' => [1, 2]
        ];
        $response = $this->post('/api/reservation', $reservationData);
        $response->assertStatus(201);
        $responseData = $response->json();
        $reservationId = $responseData['reservation']['id'];

        $response = $this->delete("/api/reservation/$reservationId");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('reservation', ['id' => $reservationId]);
    }
}
