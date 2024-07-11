<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    public function index()
    {
        $rides = Ride::with(['driver', 'user'])->get();
        return response()->json($rides);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'user_id' => 'required|exists:users,id',
            'start_location' => 'required|string',
            'end_location' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $ride = Ride::create($validated);
        return response()->json($ride, 201);
    }

    public function show(Ride $ride)
    {
        return response()->json($ride->load(['driver', 'user']));
    }

    public function update(Request $request, Ride $ride)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,active,completed,cancelled'
        ]);

        $ride->update($validated);
        return response()->json($ride);
    }

    public function destroy(Ride $ride)
    {
        $ride->delete();
        return response()->json(null, 204);
    }
}
