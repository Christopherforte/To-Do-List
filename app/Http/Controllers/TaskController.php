<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $task = $request->input('task');
        
        // Get existing tasks from session
        $tasks = session()->get('tasks', []);
        
        // Add new task
        $tasks[] = [
            'id' => uniqid(),
            'task' => $task,
            'completed' => false,
            'created_at' => now()
        ];
        
        // Store tasks back in session
        session()->put('tasks', $tasks);
        
        return redirect('/')->with('success', 'Task added successfully!');
    }
    
    public function delete($id)
    {
        // Get tasks from session
        $tasks = session()->get('tasks', []);
        
        // Remove the task
        $tasks = array_filter($tasks, function($task) use ($id) {
            return $task['id'] !== $id;
        });
        
        // Re-index array
        $tasks = array_values($tasks);
        
        // Store tasks back in session
        session()->put('tasks', $tasks);
        
        return redirect('/')->with('success', 'Task deleted successfully!');
    }
}
