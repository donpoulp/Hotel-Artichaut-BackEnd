<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
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
        $response = $this->put('/api/user/2');
        $response->assertStatus(200);
    }

    public function test_PostUser(): void
    {
        $response = $this->post('/api/user');
        $response->assertStatus(200);
    }

    public function test_DeleteUser(): void
    {
        $response = $this->delete('/api/user/5');
        $response->assertStatus(200);
    }
}
