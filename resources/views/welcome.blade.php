<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uber Clone</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .bg-image {
            background-image: url('{{ asset('background.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .overlay {
            /* background: rgba(0, 0, 0, 0.5); */
            color: #f1f1f1;
            width: 100%;
            position: absolute;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: right;
            margin: 0px 0px -42px -20px;
        }


        .content {
            z-index: 2;
            text-align: center;
        }
        .button {
            border: 5px;
            outline: 5;
            display: inline-block;
            padding: 15px 19px;
            color: #fdfdfd;
            background-color: #414143;
            text-align: center;
            cursor: pointer;
            width: 150px;
            font-weight: bold;
            font-size: 20px;
            text-decoration: auto;
        }
        .button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="bg-image">
        <div class="overlay">
            <div class="content">
                <h1>Welcome to <span style="color:#e5ad00">Uber</span>/Ola</h1>
                @if (Route::has('login'))
                    <div class="flex justify-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="button">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button" style="margin-left: 20px;">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
