<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoutesTest extends TestCase
{
    /**
     * Test whether users endpoint returns user in json
     */
    public function test_whether_users_endpoint_returns_user_in_json(): void
    {
        $users = User::all();
        //if route is working
        $response = $this->get('/api/users');

        $response->assertJson($users->toArray());
        $response->assertStatus(200);
    }
}
