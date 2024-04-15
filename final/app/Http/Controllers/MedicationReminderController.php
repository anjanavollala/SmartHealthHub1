<?php

namespace App\Http\Controllers;

use App\Models\MedicationReminder;
use Illuminate\Http\Request;

class MedicationReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all medication reminder records
        return MedicationReminder::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'medication_name' => 'required|string',
            'dosage' => 'required|string',
            'frequency' => 'required|string',
            'time' => 'required|string',
        ]);

        // Create a new medication reminder record
        $medicationReminder = MedicationReminder::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Medication reminder record created successfully', 'data' => $medicationReminder], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified medication reminder record
        $medicationReminder = MedicationReminder::findOrFail($id);

        // Return the medication reminder record
        return response()->json(['data' => $medicationReminder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'medication_name' => 'required|string',
            'dosage' => 'required|string',
            'frequency' => 'required|string',
            'time' => 'required|string',
        ]);

        // Find the medication reminder record by ID
        $medicationReminder = MedicationReminder::findOrFail($id);

        // Update the medication reminder record
        $medicationReminder->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Medication reminder record updated successfully', 'data' => $medicationReminder]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the medication reminder record by ID and delete it
        $medicationReminder = MedicationReminder::findOrFail($id);
        $medicationReminder->delete();

        // Return a success response
        return response()->json(['message' => 'Medication reminder record deleted successfully']);
    }
}
