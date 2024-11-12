<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('admin-access')) {
            $tasks = Task::latest()->paginate(10);
            return view('tasks', compact('tasks'));
        }
        // $tasks = Task::latest()->paginate(5);

        $userId = Auth::user()->id;
        $tasks = Task::where('user_id', $userId)->latest()->paginate(10);

        return view('tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|nullable'
        ]);

        // Task::create($data);
        $task = new Task($data);
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if (Gate::allows('admin-access')) {
            return view('task', compact('task'));
        }
        Gate::authorize('access-task', $task);
        return view('task', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if (Gate::allows('admin-access')) {
            return view('edit-task', compact('task'));
        }
        Gate::authorize('access-task', $task);
        return view('edit-task', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|nullable'
        ]);
       
        if (Gate::allows('admin-access')) {
            $task->update($data);
            return redirect()->route('tasks.index');
        }
        Gate::authorize('access-task', $task);
        $task->update($data);

        return redirect()->route('tasks.index');
    }

    public function updateCompleted(Request $request, Task $task)
    {
        if (Gate::allows('admin-access')) {
            $task->update([
                'completed' => !$task->completed
            ]);
            return redirect()->back();
        }

        Gate::authorize('access-task', $task);
        $task->update([
            'completed' => !$task->completed
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (Gate::allows('admin-access')) {
            $task->delete();
            return redirect()->route('tasks.index');
        }
        Gate::authorize('access-task', $task);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
