<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all specialties
        return Specialty::all();
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
            'name' => 'required|string',
        ]);

        // Create a new specialty
        $specialty = Specialty::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Specialty created successfully', 'data' => $specialty], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified specialty
        $specialty = Specialty::findOrFail($id);

        // Return the specialty
        return response()->json(['data' => $specialty]);
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
            'name' => 'required|string',
        ]);

        // Find the specialty by ID
        $specialty = Specialty::findOrFail($id);

        // Update the specialty
        $specialty->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Specialty updated successfully', 'data' => $specialty]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the specialty by ID and delete it
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();

        // Return a success response
        return response()->json(['message' => 'Specialty deleted successfully']);
    }
}
