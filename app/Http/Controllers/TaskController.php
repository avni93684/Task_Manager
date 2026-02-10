<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
        {
            $tasks = Task::where('user_id', auth()->id())
                        ->latest()
                        ->get();

            return view('tasks.index', compact('tasks'));
        }

    public function store(Request $request)
        {
            $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:5',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
        }

     public function complete(Task $task)
        {
            $task->update([
                'status' => 'completed'
            ]);

            return redirect()->back();
    }
}

