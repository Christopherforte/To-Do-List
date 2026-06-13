@extends('layout.app')
@section('title', 'Home')

@section('content')
    <h2>📝 Welcome to Home</h2>
    <p>This is the homepage of our simple website. Get organized and manage your tasks efficiently with our todo app interface.</p>
    
    <!-- Add Task Section -->
    <div style="margin-top: 25px; padding: 20px; background: #f0f8ff; border-radius: 8px;">
        <h3 style="color: #2c3e50; margin-bottom: 15px;">➕ Add New Task</h3>
        <form method="POST" action="/todos" style="display: flex; gap: 10px;">
            @csrf
            <input type="text" name="task" placeholder="Enter a new task..." style="flex: 1; padding: 12px 16px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: inherit;">
            <button type="submit" style="padding: 12px 28px; background: #27ae60; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 14px; text-transform: uppercase; transition: all 0.3s;">Add Task</button>
        </form>
    </div>
    
    <div style="margin-top: 30px; padding: 20px; background: #f9f9f9; border-radius: 8px; border-left: 4px solid #27ae60;">
        <h3 style="color: #2c3e50; margin-bottom: 15px;">📋 Todo App Features</h3>
        <ul>
            <li>✅ Create and manage tasks</li>
            <li>✅ Organize by priority</li>
            <li>✅ Track completed tasks</li>
            <li>✅ Clean, modern interface</li>
        </ul>
    </div>

    <div style="margin-top: 30px; padding: 20px; background: #f0f8ff; border-radius: 8px; border-left: 4px solid #3498db;">
        <h3 style="color: #2c3e50; margin-bottom: 15px;">🎯 Your Tasks</h3>
        
        @php
            $tasks = session()->get('tasks', []);
        @endphp
        
        @if(count($tasks) > 0)
            <table style="width: 100%; border-collapse: collapse;">
                @foreach($tasks as $task)
                    <tr style="border-bottom: 1px solid #ddd; transition: all 0.3s; background: white;">
                        <td style="padding: 12px 8px; flex: 1;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <input type="checkbox" style="width: 18px; height: 18px; cursor: pointer;">
                                <span style="color: #333; font-size: 14px;">{{ $task['task'] }}</span>
                            </div>
                        </td>
                        <td style="padding: 12px 8px; text-align: right;">
                            <a href="/todos/{{ $task['id'] }}/delete" style="color: #e74c3c; text-decoration: none; cursor: pointer; font-size: 18px; transition: all 0.3s;" onclick="return confirm('Delete this task?');">✕</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p style="color: #999; font-style: italic; text-align: center; padding: 20px;">No tasks yet. Add one above to get started! 🚀</p>
        @endif
        
        @if(count($tasks) > 0)
            <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #ddd; display: flex; justify-content: space-between; color: #666; font-size: 14px;">
                <span>📊 Total: {{ count($tasks) }}</span>
                <span>✅ Completed: 0</span>
            </div>
        @endif
    </div>
@endsection