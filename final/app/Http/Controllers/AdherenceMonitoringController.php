<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdherenceMonitoring;

class AdherenceMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdherenceMonitoring::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medication' => 'required|string',
            'date' => 'required|date',
            'adherence' => 'required|numeric',
        ]);

        $adherenceMonitoring = AdherenceMonitoring::create($validatedData);

        return response()->json(['message' => 'Adherence monitoring record created successfully', 'data' => $adherenceMonitoring], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AdherenceMonitoring::findOrFail($id);
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
        $validatedData = $request->validate([
            'medication' => 'required|string',
            'date' => 'required|date',
            'adherence' => 'required|numeric',
        ]);

        $adherenceMonitoring = AdherenceMonitoring::findOrFail($id);
        $adherenceMonitoring->update($validatedData);

        return response()->json(['message' => 'Adherence monitoring record updated successfully', 'data' => $adherenceMonitoring], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adherenceMonitoring = AdherenceMonitoring::findOrFail($id);
        $adherenceMonitoring->delete();

        return response()->json(['message' => 'Adherence monitoring record deleted successfully'], 200);
    }
}
