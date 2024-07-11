<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    // Display a listing of drivers
    public function index()
    {
        $drivers = Driver::all();
        return response()->json($drivers);
    }

    // Show the form for creating a new driver
    public function create()
    {
        // Normally handled on the frontend
    }

    // Store a newly created driver in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:drivers',
            'phone' => 'nullable|string|max:255',
            'license_number' => 'required|string|max:255|unique:drivers'
        ]);

        $driver = Driver::create($request->all());
        return response()->json($driver, 201);
    }

    // Display the specified driver
    public function show(Driver $driver)
    {
        return response()->json($driver);
    }

    // Show the form for editing the specified driver
    public function edit(Driver $driver)
    {
        // Normally handled on the frontend
    }

    // Update the specified driver in storage
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:drivers,email,' . $driver->id,
            'phone' => 'nullable|string|max:255',
            'license_number' => 'required|string|max:255|unique:drivers,license_number,' . $driver->id
        ]);

        $driver->update($request->all());
        return response()->json($driver);
    }

    // Remove the specified driver from storage
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return response()->json(null, 204);
    }
}