<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller{
    public function index(){
        return Task::all();
    }
    public function create(){
        
    }
    public function store(Request $request){
        $request->validate([ 'title' => 'required|string|max:255', ]);
        $task = Task::create($request->only('title'));
        return response()->json($task, 201);
    }
    public function show(Task $task){
        return $task;
    }
    public function edit(Task $task)
    {
        //
    }
    public function update(Request $request, Task $task){
        $task->update($request->only('title', 'completed'));
        return response()->json($task);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
