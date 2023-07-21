<?php

namespace Tests\Feature;

use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ridesTest extends TestCase
{

    public function test_index_rides(): void
    {
        $response = $this->get('/api/ride');
        $response->assertStatus(200);
    }

    public function test_show_rides(): void
    {
        $ride = Ride::all()->random();
        $response = $this->get('/api/ride/' . $ride->id);
        $response->assertStatus(200);
    }

    public function test_store_rides(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->post(
            '/api/ride',
            array(
                "start_location" => "updated Start Location",
                "end_location" => 'end location',
                "request_time" => "2023-07-21 05:17:40",
                "dropoff_time" => "2023-07-22 09:40:20"
            )
        )->assertStatus(201);
    }

    public function test_update_rides()
    {
        Sanctum::actingAs(User::factory()->create());

        $ride = Ride::all()->random();

        $this->put('/api/ride/' . $ride->id, [
            "start_location" => "a different Start Location",
            "end_location" => 'end location',
            "request_time" => "2023-07-21 05:17:40",
            "dropoff_time" => "2023-07-22 09:40:20"
        ])->assertStatus(200);
    }

    public function test_delete_rides()
    {
        Sanctum::actingAs(User::factory()->create());

        $ride = (Ride::factory()->create([
            'user_id' => 1
        ]));

        $this->delete('/api/ride/' . $ride->id)->assertStatus(204);
    }

}