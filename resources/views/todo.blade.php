@extends('layout.app')
@section('title', 'To-Do List')

@section('content')
    <div class="notebook-wrapper">
        <div class="notebook-container">
            <!-- Dotted Background -->
            <div class="dotted-bg"></div>

            <!-- Laptop Illustration -->
            <div class="laptop-illustration">
                <div class="laptop-body">
                    <div class="laptop-screen">
                        <div class="screen-shine"></div>
                    </div>
                </div>
            </div>

            <!-- Title Label -->
            <div class="title-label">
                To-Do List
            </div>

            <!-- Main Content -->
            <div class="notebook-content">
                <!-- Subtitle -->
                <h2 class="subtitle">~ Today I need to ~</h2>

                <!-- Add Task Form -->
                <form method="POST" action="/todos" class="task-form">
                    @csrf
                    <div class="input-group-wrapper">
                        <input type="text" name="task" placeholder="Netflix, Coding, Exercise..." class="notebook-input" required>
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>

                <!-- Tasks List -->
                <div class="tasks-container">
                    @if(isset($todos) && count($todos) > 0)
                        <ul class="notebook-list">
                            @foreach($todos as $todo)
                                <li class="notebook-item {{ $todo->completed ? 'checked' : '' }}">
                                    <input type="checkbox" class="custom-checkbox" {{ $todo->completed ? 'checked' : '' }}>
                                    <span class="task-bullet">•</span>
                                    <span class="task-text">{{ $todo->task }}</span>
                                    <a href="/todos/{{ $todo->id }}/delete" class="task-delete">×</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="empty-notebook">
                            <p>Start adding tasks to your list! ✨</p>
                        </div>
                    @endif
                </div>

                <!-- Stats -->
                <div class="notebook-stats">
                    <span class="stat">📊 Total: {{ isset($todos) ? count($todos) : 0 }}</span>
                    <span class="stat">✅ Done: {{ isset($todos) ? $todos->where('completed', true)->count() : 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .notebook-wrapper {
            background: linear-gradient(135deg, #b19cd9 0%, #dda0dd 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Comic Sans MS', 'Segoe UI', cursive, sans-serif;
        }

        .notebook-container {
            position: relative;
            width: 100%;
            max-width: 650px;
            background: linear-gradient(to bottom, #f5f5f0 0%, #fffef5 100%);
            border-radius: 25px;
            padding: 50px 40px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.2),
                inset 0 0 0 1px rgba(0, 0, 0, 0.05);
            border: 3px solid rgba(0, 0, 0, 0.08);
        }

        /* Dotted Background Pattern */
        .dotted-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle, #d0d0d0 1.5px, transparent 1.5px);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            border-radius: 25px;
            opacity: 0.6;
            pointer-events: none;
        }

        .notebook-content {
            position: relative;
            z-index: 2;
        }

        /* Laptop Illustration */
        .laptop-illustration {
            position: absolute;
            top: -40px;
            left: 40px;
            width: 120px;
            height: 80px;
            z-index: 3;
        }

        .laptop-body {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .laptop-screen {
            width: 100px;
            height: 65px;
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
            border-radius: 8px;
            border: 2px solid #333;
            position: relative;
            transform: perspective(100px) rotateX(10deg);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .screen-shine {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 40%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 6px 6px 0 0;
        }

        .laptop-body::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 10%;
            width: 80%;
            height: 8px;
            background: #333;
            border-radius: 0 0 4px 4px;
        }

        /* Title Label */
        .title-label {
            display: inline-block;
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
            color: #333;
            padding: 12px 32px;
            border-radius: 50px;
            font-size: 24px;
            font-weight: bold;
            margin-left: 140px;
            margin-bottom: 40px;
            transform: rotate(-5deg);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        /* Subtitle */
        .subtitle {
            font-size: 18px;
            color: #666;
            text-align: left;
            margin-bottom: 25px;
            font-weight: normal;
            font-style: italic;
            letter-spacing: 1px;
        }

        /* Input Group */
        .input-group-wrapper {
            display: flex;
            gap: 12px;
            margin-bottom: 35px;
            align-items: center;
        }

        .notebook-input {
            flex: 1;
            padding: 14px 18px;
            font-size: 16px;
            border: 2px dashed #999;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.8);
            font-family: 'Comic Sans MS', cursive;
            transition: all 0.3s ease;
            color: #666;
        }

        .notebook-input::placeholder {
            color: #bbb;
            font-style: italic;
            text-decoration: line-through;
            text-decoration-color: #ddd;
        }

        .notebook-input:focus {
            outline: none;
            border-color: #20c997;
            background: white;
            box-shadow: 0 0 0 3px rgba(32, 201, 151, 0.1);
        }

        .submit-btn {
            padding: 12px 28px;
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
            color: white;
            border: 2px solid #333;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            font-family: 'Comic Sans MS', cursive;
            transition: all 0.3s ease;
            transform: rotate(2deg);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .submit-btn:hover {
            transform: rotate(2deg) translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
        }

        .submit-btn:active {
            transform: rotate(2deg) translateY(0);
        }

        /* Tasks Container */
        .tasks-container {
            margin-top: 30px;
        }

        .notebook-list {
            list-style: none;
            padding: 0;
        }

        .notebook-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 0;
            margin-bottom: 8px;
            position: relative;
            transition: all 0.3s ease;
        }

        .notebook-item::before {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: #333;
            opacity: 0;
            transition: width 0.3s ease;
        }

        .notebook-item.checked::before {
            width: 100%;
            opacity: 0.3;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #20c997;
        }

        .task-bullet {
            font-size: 20px;
            color: #333;
            line-height: 1;
        }

        .task-text {
            flex: 1;
            font-size: 18px;
            color: #333;
            font-family: 'Comic Sans MS', cursive;
            transition: all 0.3s ease;
        }

        .notebook-item.checked .task-text {
            text-decoration: line-through;
            color: #ccc;
            opacity: 0.7;
        }

        .task-delete {
            font-size: 22px;
            color: #d9534f;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .task-delete:hover {
            background: #ffe0e0;
            transform: scale(1.2) rotate(90deg);
        }

        /* Empty State */
        .empty-notebook {
            text-align: center;
            padding: 40px 20px;
            font-size: 18px;
            color: #999;
            font-style: italic;
        }

        /* Stats */
        .notebook-stats {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px dashed #ddd;
        }

        .stat {
            font-size: 16px;
            color: #666;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .notebook-container {
                padding: 40px 25px;
            }

            .laptop-illustration {
                width: 80px;
                height: 60px;
                top: -30px;
                left: 20px;
            }

            .title-label {
                margin-left: 100px;
                font-size: 20px;
                padding: 10px 24px;
            }

            .subtitle {
                font-size: 16px;
                margin-bottom: 20px;
            }

            .input-group-wrapper {
                flex-direction: column;
            }

            .notebook-input,
            .submit-btn {
                width: 100%;
            }

            .notebook-list {
                padding: 0 10px;
            }
        }
    </style>
@endsection

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .todo-wrapper {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 15px;
        }

        .todo-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .todo-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header-content h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Add Task Section */
        .add-task-section {
            padding: 30px;
            border-bottom: 1px solid #f0f0f0;
            background: #fafafa;
        }

        .input-wrapper {
            display: flex;
            gap: 10px;
        }

        .task-input {
            flex: 1;
            padding: 14px 18px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s ease;
            background: white;
        }

        .task-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .task-input::placeholder {
            color: #b0b0b0;
        }

        .btn-add {
            padding: 14px 28px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-add:active {
            transform: translateY(0);
        }

        .plus {
            font-size: 18px;
            font-weight: bold;
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 25px 30px;
            border-bottom: 1px solid #f0f0f0;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .stat-card.total {
            background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
            border: 1px solid #667eea30;
        }

        .stat-card.completed {
            background: linear-gradient(135deg, #34a85315 0%, #27ae6015 100%);
            border: 1px solid #27ae6030;
        }

        .stat-card.pending {
            background: linear-gradient(135deg, #f39c1215 0%, #e67e2215 100%);
            border: 1px solid #f39c1230;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .stat-icon {
            font-size: 28px;
        }

        .stat-info {
            flex: 1;
        }

        .stat-label {
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Tasks Section */
        .tasks-section {
            padding: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tasks-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .task-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .task-card:hover {
            background: white;
            border-color: #667eea;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
            transform: translateX(2px);
        }

        .task-card.completed {
            opacity: 0.6;
            background: #f5f5f5;
        }

        /* Custom Checkbox */
        .task-checkbox-wrapper {
            position: relative;
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        .task-checkbox {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .checkbox-custom {
            position: absolute;
            top: 0;
            left: 0;
            width: 24px;
            height: 24px;
            border: 2px solid #667eea;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .task-checkbox:checked ~ .checkbox-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
        }

        .task-checkbox:checked ~ .checkbox-custom::after {
            content: '✓';
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        /* Task Content */
        .task-content {
            flex: 1;
            min-width: 0;
        }

        .task-text {
            font-size: 15px;
            color: #333;
            word-break: break-word;
            transition: all 0.3s ease;
        }

        .task-card.completed .task-text {
            text-decoration: line-through;
            color: #999;
        }

        /* Delete Button */
        .btn-delete {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fee;
            color: #d32f2f;
            text-decoration: none;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
            border: 1px solid transparent;
        }

        .btn-delete:hover {
            background: #fdd;
            border-color: #d32f2f;
            transform: rotate(90deg);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 30px;
        }

        .empty-icon {
            font-size: 64px;
            margin-bottom: 20px;
            display: block;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .empty-state h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 14px;
            color: #888;
        }

        /* Footer */
        .todo-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            font-size: 14px;
            color: #888;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .todo-wrapper {
                padding: 15px;
            }

            .todo-header {
                padding: 30px 20px;
            }

            .header-content h1 {
                font-size: 24px;
            }

            .add-task-section,
            .tasks-section {
                padding: 20px;
            }

            .stats-section {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .input-wrapper {
                flex-direction: column;
            }

            .btn-add {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection
