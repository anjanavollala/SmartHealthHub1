<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all prescriptions
        return Prescription::all();
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
            'dosage' => 'required|string',
            'instructions' => 'required|string',
            'date_prescribed' => 'required|date',
        ]);

        // Create a new prescription
        $prescription = Prescription::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Prescription created successfully', 'data' => $prescription], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified prescription
        $prescription = Prescription::findOrFail($id);

        // Return the prescription
        return response()->json(['data' => $prescription]);
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
            'dosage' => 'required|string',
            'instructions' => 'required|string',
            'date_prescribed' => 'required|date',
        ]);

        // Find the prescription by ID
        $prescription = Prescription::findOrFail($id);

        // Update the prescription
        $prescription->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Prescription updated successfully', 'data' => $prescription]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the prescription by ID and delete it
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();

        // Return a success response
        return response()->json(['message' => 'Prescription deleted successfully']);
    }
}
