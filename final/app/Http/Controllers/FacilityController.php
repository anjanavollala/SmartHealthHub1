<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all facilities
        return Facility::all();
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
            'facility_name' => 'required|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        // Create a new facility
        $facility = Facility::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Facility created successfully', 'data' => $facility], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified facility
        $facility = Facility::findOrFail($id);

        // Return the facility
        return response()->json(['data' => $facility]);
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
            'facility_name' => 'required|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        // Find the facility by ID
        $facility = Facility::findOrFail($id);

        // Update the facility
        $facility->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Facility updated successfully', 'data' => $facility]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the facility by ID and delete it
        $facility = Facility::findOrFail($id);
        $facility->delete();

        // Return a success response
        return response()->json(['message' => 'Facility deleted successfully']);
    }
}
