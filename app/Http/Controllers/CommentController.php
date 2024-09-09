<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($taskId)
    {
        $comments = Comment::where('task_id', $taskId)->get();
        return response()->json($comments);
    }

    public function store(Request $request, $taskId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $task = Task::findOrFail($taskId);

        $comment = Comment::create([
            'content' => $validated['content'],
            'task_id' => $taskId,
            'user_id' => Auth::id(),
        ]);

        return response()->json($comment, 201);
    }

    public function show($taskId, $id)
    {
        $comment = Comment::where('task_id', $taskId)->where('id', $id)->firstOrFail();
        return response()->json($comment);
    }

    public function update(Request $request, $taskId, $id)
    {
        $comment = Comment::where('task_id', $taskId)->where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($validated);
        return response()->json($comment);
    }

    public function destroy($taskId, $id)
    {
        $comment = Comment::where('task_id', $taskId)->where('id', $id)->firstOrFail();
        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
