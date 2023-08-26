<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->get(); // Ou $user->tasks()->paginate();
        return response()->json($tasks);
    }

    public function store (Request $request)
    {
        $user = Auth::user();

        $title = $request->input('title');
        $description = $request->input('description');

        if (empty($title)) {
            return response()->json(['error' => 'Title is required'], 400);
        }

        $task = new Task([
            'title' => $title,
            'description' => $description,
        ]);

        $user->tasks()->save($task);

        return response()->json(['message' => 'Task created successfully'], 201);
    }

    public function show (Task $task)
    {
        $user = Auth::user();
        if ($user->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return response()->json($task);
    }
}
