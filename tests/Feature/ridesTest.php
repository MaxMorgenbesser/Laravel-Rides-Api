<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ridesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = $this->get('/api/ride');
        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        $response = $this->get('/api/ride/1');
        $response->assertStatus(200);

   



        
    }
}