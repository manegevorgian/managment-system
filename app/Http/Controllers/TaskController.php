<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function task()
    {
        $tasks = Task::paginate(10);

        return view('tasks.task', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = new Task();
        $users = Auth::user()->pluck('name', 'id');
        return view('tasks.create', compact('tasks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'assignt_to' => 'required',
            'status' => 'required',
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.task')->with('message', "Contact has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::find($id);
        return view('tasks.show' , compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tasks = Task::findOrFail($id);
        return view('tasks.editd', compact( 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $request->validate([
            'task_name' => 'required',
            'assignt_to' => 'required',
            'status' => 'required',
        ]);
        $tasks = Task::find($id);
        $tasks->update($request->all());
        return redirect()->route('tasks.task')->with('message', "Contact has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return back()->with('message', "Contact has been deleted successfully");
    }
}
