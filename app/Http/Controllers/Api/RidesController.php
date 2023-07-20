<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RidesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }
    public function index()
    {
        return \App\Models\Ride::all();
    }


    public function store(Request $request)
    {
        $ride = \App\Models\Ride::create([
            ...$request->validate([
                'start_location' => 'required|string',
                'end_location' => 'required|string',
                'request_time' => 'required|date',
                'dropoff_time' => 'required|date|after:request_time'
                
            ]),
            'user_id' => $request->user()->id
        ]);

        return $ride;
    }
    public function show(\App\Models\Ride $ride)
    {
        return $ride;
    }
    public function update(Request $request, \App\Models\Ride $ride)
    {
        $ride->update(
            $request->validate([
                'start_location' => 'required|string',
                'end_location' => 'required|string',
                'request_time' => 'required|date',
                'dropoff_time' => 'required|date|after:request_time'
            ]),
        );

        return $ride;
    }

    public function destroy(\App\Models\Ride $Ride)
    {
        $Ride->delete();

        return response(status: 204);
    }
}