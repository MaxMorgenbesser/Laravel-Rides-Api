<?php

namespace Tests\Feature;

use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RidersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_riders(): void
    {
        $ride = Ride::all()->random();
        $this->get('/api/ride/' . $ride->id . '/riders')->assertStatus(200);
    }

    public function test_show_riders(): void
    {
        $ride = Ride::all()->random();
        $rider = $ride->riders()->get()->random();
        $this->get('/api/ride/' . $ride->id . '/riders/' . $rider->id)->assertStatus(200);
    }

    public function test_store_riders()
    {
        Sanctum::actingAs(User::factory()->create());
        $ride = Ride::all()->random();
        $this->post('/api/ride/' . $ride->id . '/riders', [
            'user_id' => 1
        ])->assertStatus(201);
    }

    public function test_delete_riders ()
    {
        Sanctum::actingAs(User::factory()->create());
        $ride = Ride::all()->random();
        $rider = $ride->riders()->get()->random();
        $this->delete('/api/ride/' . $ride->id . '/riders/' . $rider->id)->assertStatus(204);

    }
}