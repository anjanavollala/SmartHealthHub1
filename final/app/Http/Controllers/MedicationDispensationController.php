<?php

namespace App\Http\Controllers;

use App\Models\MedicationDispensation;
use Illuminate\Http\Request;

class MedicationDispensationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all medication dispensation records
        return MedicationDispensation::all();
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
            'medication' => 'required|string',
            'date' => 'required|date',
            'quantity' => 'required|integer|min:0',
        ]);

        // Create a new medication dispensation record
        $medicationDispensation = MedicationDispensation::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Medication dispensation record created successfully', 'data' => $medicationDispensation], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified medication dispensation record
        $medicationDispensation = MedicationDispensation::findOrFail($id);

        // Return the medication dispensation record
        return response()->json(['data' => $medicationDispensation]);
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
            'medication' => 'required|string',
            'date' => 'required|date',
            'quantity' => 'required|integer|min:0',
        ]);

        // Find the medication dispensation record by ID
        $medicationDispensation = MedicationDispensation::findOrFail($id);

        // Update the medication dispensation record
        $medicationDispensation->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Medication dispensation record updated successfully', 'data' => $medicationDispensation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the medication dispensation record by ID and delete it
        $medicationDispensation = MedicationDispensation::findOrFail($id);
        $medicationDispensation->delete();

        // Return a success response
        return response()->json(['message' => 'Medication dispensation record deleted successfully']);
    }
}
