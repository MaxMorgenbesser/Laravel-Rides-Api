<?php

namespace Database\Seeders;

use App\Models\Ride;
use App\Models\Riders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class RidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $rides = Ride::all();
            $ridesToTake = $rides->random(rand(1, 3));

            foreach ($ridesToTake as $ride) {
                Riders::create([
                    'user_id' => $user->id,
                    'ride_id' => $ride->id
                ]);
            }
        }
    }
}