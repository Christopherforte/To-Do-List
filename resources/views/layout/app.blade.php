<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>

    <link rel="stylesheet" href="{{ asset('css/.stylesheet.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* Main Wrapper */
        .main-wrapper {
            background: #f5f5f5;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Header */
        .app-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .app-header h1 {
            font-size: 32px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Navigation */
        nav {
            background: #2c3e50;
            display: flex;
            gap: 0;
            padding: 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
        }

        nav a {
            flex: 1;
            padding: 16px 20px;
            background: #34495e;
            color: #bbb;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
            min-width: 100px;
        }

        nav a:hover {
            background: #3d5064;
            color: white;
        }

        nav a.active,
        nav a:first-child {
            background: #2c3e50;
            color: white;
            border-bottom-color: #27ae60;
        }

        /* Content Area */
        .content-wrapper {
            padding: 30px;
            background: white;
        }

        .content-wrapper h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .content-wrapper p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .content-wrapper ul {
            list-style: none;
            padding: 0;
        }

        .content-wrapper li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            color: #666;
        }

        .content-wrapper li:last-child {
            border-bottom: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav a {
                flex: 1 1 50%;
                min-width: auto;
            }

            .content-wrapper {
                padding: 20px;
            }

            .app-header {
                padding: 20px;
            }

            .app-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="main-container">
            <!-- Header -->
            <div class="app-header">
                <h1>To-Do List</h1>
            </div>

            <!-- Navigation -->
            @include('partials.nav')

            <!-- Content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>