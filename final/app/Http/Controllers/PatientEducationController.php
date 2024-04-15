<?php

namespace App\Http\Controllers;

use App\Models\PatientEducation;
use Illuminate\Http\Request;

class PatientEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all patient education resources
        return PatientEducation::all();
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
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|url',
            'category' => 'required|string',
        ]);

        // Create a new patient education resource
        $patientEducation = PatientEducation::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Patient education resource created successfully', 'data' => $patientEducation], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified patient education resource
        $patientEducation = PatientEducation::findOrFail($id);

        // Return the patient education resource
        return response()->json(['data' => $patientEducation]);
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
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|url',
            'category' => 'required|string',
        ]);

        // Find the patient education resource by ID
        $patientEducation = PatientEducation::findOrFail($id);

        // Update the patient education resource
        $patientEducation->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Patient education resource updated successfully', 'data' => $patientEducation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the patient education resource by ID and delete it
        $patientEducation = PatientEducation::findOrFail($id);
        $patientEducation->delete();

        // Return a success response
        return response()->json(['message' => 'Patient education resource deleted successfully']);
    }
}
