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

        return view('task', compact('tasks'));
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
        //dd($request->all());

        return redirect()->route('tasks');
    }

    public function complete(Task $task)
    {
        $task->update([
            'status' => 'completed'
        ]);

        return redirect()->back();
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:5',
        ]);

        $product->update($validated);

        return redirect()->route('tasks')
                        ->with('success', 'Product updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks')->with('success', 'Task deleted successfully!');
    }

    public function bladeTest2()
    {
        return view('task');
    }
    public function create()
    {
        return view('tasks.create');
    }
}

