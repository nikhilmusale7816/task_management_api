<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'due_date' => $validated['due_date'],
            'user_id' => Auth::id(),
        ]);

        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
            'due_date' => 'sometimes|required|date',
        ]);

        $task->update($validated);
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
