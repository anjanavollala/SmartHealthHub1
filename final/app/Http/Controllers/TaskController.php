<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all tasks
        $tasks = Task::all();

        // Return the tasks
        return response()->json(['data' => $tasks]);
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
            'assigned_to' => 'required|string',
            'due_date' => 'required|date',
        ]);

        // Create a new task
        $task = Task::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Task created successfully', 'data' => $task], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the specified task
        $task = Task::findOrFail($id);

        // Return the task
        return response()->json(['data' => $task]);
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
            'assigned_to' => 'required|string',
            'due_date' => 'required|date',
        ]);

        // Find the task by ID and update it
        $task = Task::findOrFail($id);
        $task->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Task updated successfully', 'data' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the task by ID and delete it
        $task = Task::findOrFail($id);
        $task->delete();

        // Return a success response
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
