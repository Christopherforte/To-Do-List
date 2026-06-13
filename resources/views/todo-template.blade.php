@extends('layout.app')
@section('title', 'To-Do List')

@section('content')
    <div class="container">
        <h1>My To-Do List</h1>
        
        <!-- Add New Task Form -->
        <div class="todo-form">
            <form method="POST" action="/todos">
                @csrf
                <input type="text" name="task" placeholder="Add a new task..." required>
                <button type="submit">Add Task</button>
            </form>
        </div>

        <!-- To-Do List Items -->
        <div class="todo-list">
            <h2>Tasks</h2>
            @if(isset($todos) && count($todos) > 0)
                <ul>
                    @foreach($todos as $todo)
                        <li>
                            <input type="checkbox" {{ $todo->completed ? 'checked' : '' }}>
                            <span class="{{ $todo->completed ? 'completed' : '' }}">{{ $todo->task }}</span>
                            <a href="/todos/{{ $todo->id }}/delete" class="delete-btn">Delete</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No tasks yet. Add one to get started!</p>
            @endif
        </div>

        <!-- Stats -->
        <div class="todo-stats">
            <p>Total Tasks: <strong>{{ isset($todos) ? count($todos) : 0 }}</strong></p>
            <p>Completed: <strong>{{ isset($todos) ? $todos->where('completed', true)->count() : 0 }}</strong></p>
        </div>
    </div>

    <style>
        .todo-form {
            margin: 20px 0;
        }

        .todo-form input {
            padding: 10px;
            font-size: 16px;
            width: 70%;
        }

        .todo-form button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .todo-form button:hover {
            background-color: #0056b3;
        }

        .todo-list ul {
            list-style: none;
            padding: 0;
        }

        .todo-list li {
            padding: 10px;
            margin: 5px 0;
            background-color: #f5f5f5;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .todo-list span.completed {
            text-decoration: line-through;
            color: #999;
        }

        .delete-btn {
            margin-left: auto;
            color: #dc3545;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            text-decoration: underline;
        }

        .todo-stats {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 4px;
        }
    </style>
@endsection
