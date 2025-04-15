<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_allUsers(): void
    {
        $response = $this->get('/api/user');
        $response->assertStatus(200);
    }

    public function test_UserShowid(): void
    {
        $response = $this->get('/api/user/2');
        $response->assertStatus(200);
    }

    public function test_UpdateUser(): void
    {
        $user = User::factory()->create();
        $updateData = [
            'firstName' => 'NewFirstName',
            'lastName' => 'NewLastName',
            'email' => 'newemail@example.com',
        ];
        $response = $this->put("/api/user/{$user->id}", $updateData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'firstName' => 'NewFirstName',
            'lastName' => 'NewLastName',
            'email' => 'newemail@example.com',
        ]);
    }

    public function test_PostUser(): void
    {
        $userData = [
            'firstName' => 'John',
            'lastName' => 'Dounia',
            'email' => 'john.douniav@example.com',
            'password' => 'password123',
            'phone' => '1234567890',
        ];
        $response = $this->post('/api/user', $userData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'john.douniav@example.com',
        ]);
    }

    public function test_DeleteUser(): void
    {
        $response = $this->delete('/api/user/5');
        $response->assertStatus(200);
    }
}
