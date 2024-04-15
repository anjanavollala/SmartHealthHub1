<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all messages
        return Message::all();
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
            'recipient' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        // Create a new message
        $message = Message::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Message created successfully', 'data' => $message], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified message
        $message = Message::findOrFail($id);

        // Return the message
        return response()->json(['data' => $message]);
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
            'recipient' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        // Find the message by ID
        $message = Message::findOrFail($id);

        // Update the message
        $message->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Message updated successfully', 'data' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the message by ID and delete it
        $message = Message::findOrFail($id);
        $message->delete();

        // Return a success response
        return response()->json(['message' => 'Message deleted successfully']);
    }
}
