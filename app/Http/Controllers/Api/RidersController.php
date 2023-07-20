<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\Riders;
use Illuminate\Http\Request;

class RidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
     {
         $this->middleware('auth:sanctum')->except(['index', 'show']);
     }
    public function index(Ride $ride)
    {
        $riders = $ride->riders()->latest()->get();

        return $riders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Ride $ride)
    {
        $rider = $ride->riders()->create([
            'user_id' => $request -> user() -> id
        ]);

        return $rider;
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride, Riders $rider)
    {
        return $rider;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride, Riders $rider)
    {
        $rider->delete();

        return response(status: 204);
    }
}