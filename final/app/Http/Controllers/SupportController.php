<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all support messages
        return Support::all();
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
            'message' => 'required|string',
        ]);

        // Create a new support message
        $support = Support::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Support message created successfully', 'data' => $support], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified support message
        $support = Support::findOrFail($id);

        // Return the support message
        return response()->json(['data' => $support]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the support message by ID and delete it
        $support = Support::findOrFail($id);
        $support->delete();

        // Return a success response
        return response()->json(['message' => 'Support message deleted successfully']);
    }
}
