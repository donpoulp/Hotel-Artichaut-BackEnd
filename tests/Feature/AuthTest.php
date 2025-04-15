<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function test_register(): void
    {
        // test ok
        $response = $this->post('/api/register', [
            'firstName' => 'register',
            'email' => 'register@example.com',
            'password' => 'register123',
            'is_admin' => '0',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user',
                'access_token',
                'token_type',
            ]);

        // test ko (same email)
        $response = $this->post('/api/register', [
            'firstName' => 'registerko',
            'email' => 'register@example.com',
            'password' => 'testos123',
            'is_admin' => '0',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'Échec de l’inscription',
            ]);
    }

    public function test_login(): void
    {
        User::factory()->create([
            'email' => 'login@example.com',
            'password' => 'password123',
            'is_admin' => '0',
        ]);

        // Test ok
        $response = $this->post('/api/login', [
            'email' => 'login@example.com',
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
            'email' => 'login@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'Invalid login details',
            ]);
    }

//    public function test_logout(): void
//    {
//        User::factory()->create([
//            'email' => 'logout@example.com',
//            'password' => 'password123',
//            'is_admin' => '0',
//        ]);
//
//        $loginResponse = $this->post('/api/login', [
//            'email' => 'logout@example.com',
//            'password' => 'password123',
//        ]);
//
//        $token = $loginResponse->json('access_token');
//
//        $response = $this->post('/api/logout', [], [
//            'Authorization' => 'Bearer ' . $token
//        ]);
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'message' => 'Successfully logged out',
//            ]);
//    }
}
