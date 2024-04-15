<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all consultations
        return Consultation::all();
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
            'reason' => 'required|string',
            'prescription' => 'required|string',
        ]);

        // Create a new consultation
        $consultation = Consultation::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Consultation created successfully', 'data' => $consultation], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified consultation
        $consultation = Consultation::findOrFail($id);

        // Return the consultation
        return response()->json(['data' => $consultation]);
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
            'reason' => 'required|string',
            'prescription' => 'required|string',
        ]);

        // Find the consultation by ID
        $consultation = Consultation::findOrFail($id);

        // Update the consultation
        $consultation->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Consultation updated successfully', 'data' => $consultation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the consultation by ID and delete it
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        // Return a success response
        return response()->json(['message' => 'Consultation deleted successfully']);
    }
}
