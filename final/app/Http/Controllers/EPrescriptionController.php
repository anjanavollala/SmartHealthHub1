<?php

namespace App\Http\Controllers;

use App\Models\EPrescription;
use Illuminate\Http\Request;

class EPrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all e-prescriptions
        return EPrescription::all();
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
            'prescription' => 'required|string',
            'dosage' => 'required|string',
            'instructions' => 'required|string',
            'date_prescribed' => 'required|date',
        ]);

        // Create a new e-prescription
        $prescription = EPrescription::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'EPrescription created successfully', 'data' => $prescription], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified e-prescription
        $prescription = EPrescription::findOrFail($id);

        // Return the e-prescription
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
            'prescription' => 'required|string',
            'dosage' => 'required|string',
            'instructions' => 'required|string',
            'date_prescribed' => 'required|date',
        ]);

        // Find the e-prescription by ID
        $prescription = EPrescription::findOrFail($id);

        // Update the e-prescription
        $prescription->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'EPrescription updated successfully', 'data' => $prescription]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the e-prescription by ID and delete it
        $prescription = EPrescription::findOrFail($id);
        $prescription->delete();

        // Return a success response
        return response()->json(['message' => 'EPrescription deleted successfully']);
    }
}
