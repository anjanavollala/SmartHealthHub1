<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all symptoms
        return Symptom::all();
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
            'symptoms' => 'required|string',
            'response' => 'required|string',
        ]);

        // Create a new symptom with the validated data
        $symptom = Symptom::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Symptom and response created successfully', 'data' => $symptom], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified symptom
        $symptom = Symptom::findOrFail($id);

        // Return the symptom
        return response()->json(['data' => $symptom]);
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
            'symptoms' => 'required|string',
            'response' => 'required|string',
        ]);

        // Find the symptom by ID
        $symptom = Symptom::findOrFail($id);

        // Update the symptom with the validated data
        $symptom->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Symptom and response updated successfully', 'data' => $symptom]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the symptom by ID and delete it
        $symptom = Symptom::findOrFail($id);
        $symptom->delete();

        // Return a success response
        return response()->json(['message' => 'Symptom and response deleted successfully']);
    }
}
