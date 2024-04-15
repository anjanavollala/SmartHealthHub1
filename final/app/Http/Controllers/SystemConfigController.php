<?php

namespace App\Http\Controllers;

use App\Models\SystemConfig;
use Illuminate\Http\Request;

class SystemConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all system configurations
        return SystemConfig::all();
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
            // 'logo' => 'required|image|max:2048', // Example validation for logo (optional)
            'theme' => 'required|string',
            'timezone' => 'required|string',
            'language' => 'required|string',
        ]);

        // Create a new system configuration
        $systemConfig = SystemConfig::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'System configuration created successfully', 'data' => $systemConfig], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified system configuration
        $systemConfig = SystemConfig::findOrFail($id);

        // Return the system configuration
        return response()->json(['data' => $systemConfig]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the system configuration by ID and delete it
        $systemConfig = SystemConfig::findOrFail($id);
        $systemConfig->delete();

        // Return a success response
        return response()->json(['message' => 'System configuration deleted successfully']);
    }
}
