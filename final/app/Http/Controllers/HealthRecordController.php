<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all health records
        return HealthRecord::all();
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
            'date' => 'required|date',
            'doctor' => 'required|string',
            'specialty' => 'required|string',
            'details' => 'required|string',
        ]);

        // Create a new health record
        $healthRecord = HealthRecord::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Health record created successfully', 'data' => $healthRecord], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified health record
        $healthRecord = HealthRecord::findOrFail($id);

        // Return the health record
        return response()->json(['data' => $healthRecord]);
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
            'date' => 'required|date',
            'doctor' => 'required|string',
            'specialty' => 'required|string',
            'details' => 'required|string',
        ]);

        // Find the health record by ID
        $healthRecord = HealthRecord::findOrFail($id);

        // Update the health record
        $healthRecord->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Health record updated successfully', 'data' => $healthRecord]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the health record by ID and delete it
        $healthRecord = HealthRecord::findOrFail($id);
        $healthRecord->delete();

        // Return a success response
        return response()->json(['message' => 'Health record deleted successfully']);
    }
}
