<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_register(): void
    {
        // données valides
        $response = $this->post('/api/register', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'securepassword123',
            'phone' => '1234567890',
            'is_admin' => '0',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user',
                'access_token',
                'token_type',
            ]);

        // données invalides (email)
        $response = $this->post('/api/register', [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'securepassword123',
            'phone' => '0987654321',
            'is_admin' => '0',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'Échec de l’inscription',
            ]);
    }

    public function test_login(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'is_admin' => '0',
        ]);

        // Test ok
        $response = $this->post('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'user',
            ]);

        // Test ko
        $response = $this->post('/api/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'Invalid login details',
            ]);
    }

    public function test_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'logout@example.com',
            'password' => bcrypt('password123'),
            'is_admin' => '0',
        ]);

        $loginResponse = $this->post('/api/login', [
            'email' => 'logout@example.com',
            'password' => 'password123',
        ]);

        $token = $loginResponse->json('access_token');

        $response = $this->post('/api/logout', [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Successfully logged out',
            ]);
    }
}
