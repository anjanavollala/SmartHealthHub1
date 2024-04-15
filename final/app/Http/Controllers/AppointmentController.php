<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Import the Appointment model

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::all();
    }

    public function create()
    {
        // Not required for API
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|string',
            'doctor' => 'required|string',
            'patient' => 'required|string',
            'reason' => 'required|string',
        ]);

        $appointment = Appointment::create($request->all());

        return response()->json(['message' => 'Appointment created successfully', 'data' => $appointment], 201);
    }

    public function show($id)
    {
        return Appointment::findOrFail($id);
    }

    public function edit($id)
    {
        // Not required for API
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'date' => 'required|date',
            'time' => 'required|string',
            'doctor' => 'required|string',
            'patient' => 'required|string',
            'reason' => 'required|string',
        ]);

        $appointment->update($request->all());

        return response()->json(['message' => 'Appointment updated successfully', 'data' => $appointment], 200);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }
}
