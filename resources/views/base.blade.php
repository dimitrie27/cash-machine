<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cash Machine</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        form {
            padding: 10px;
        }

        .alert {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a href="{{ route('homepage') }}" class="navbar-brand">Homepage</a>
    </nav>
    <div class="flex-center position-ref">
        <div class="content">
            @yield('content')
        </div>
    </div>
    <div class="container">
        @yield('container')
    </div>
</body>
</html>
