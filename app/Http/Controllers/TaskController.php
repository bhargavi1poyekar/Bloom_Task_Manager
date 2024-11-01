<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(2);
        return view('tasks.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:Completed,Pending'
        ]);
    
         // Use only() to filter the request data
        Task::create($request->only(['title', 'description', 'status']));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     return view('tasks.edit', compact('task'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:Completed,Pending'
        ]);
    
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Completed,Pending',
        ]);

        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
