<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticateUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
    }

    /**
     * Test listing all clients.
     */
    public function test_can_list_clients()
    {
        $this->authenticateUser();

        Client::factory()->count(5)->create();

        $response = $this->getJson('/api/clients');

        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }

    /**
     * Test creating a client.
     */
    public function test_can_create_client()
    {
        $this->authenticateUser();

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'number' => '1234567890',
            'company' => true,
            'lead' => false,
            'address' => '123 Main St',
            'referred_by' => 'Jane Doe',
        ];

        $response = $this->postJson('/api/clients', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'John Doe']);

        $this->assertDatabaseHas('clients', ['email' => 'john@example.com']);
    }

    /**
     * Test showing a single client.
     */
    public function test_can_show_client()
    {
        $this->authenticateUser();

        $client = Client::factory()->create();

        $response = $this->getJson("/api/clients/{$client->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $client->name]);
    }

    /**
     * Test updating a client.
     */
    public function test_can_update_client()
    {
        $this->authenticateUser();

        $client = Client::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'email' => $client->email,
            'number' => '0987654321',
            'company' => false,
            'lead' => true,
            'address' => 'Updated Address',
            'referred_by' => 'Updated Referrer',
        ];

        $response = $this->putJson("/api/clients/{$client->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Name']);

        $this->assertDatabaseHas('clients', ['name' => 'Updated Name']);
    }

    /**
     * Test deleting a client.
     */
    public function test_can_delete_client()
    {
        $this->authenticateUser();

        $client = Client::factory()->create();

        $response = $this->deleteJson("/api/clients/{$client->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Client deleted successfully']);

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
