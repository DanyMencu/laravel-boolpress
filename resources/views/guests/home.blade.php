<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Library FRONT-OFFICE</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {{-- CSS --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
        align-items: center;
        display: flex;
        justify-content: center;
    }
                
    .position-ref {
        position: relative;
    }
                
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }
                
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>
</head>

<body>
    <div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/admin') }}">Personal Area</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div id="root"></div>
    </div>
    
    
    {{-- JS --}}
    <script src="{{ asset('js/front-office.js') }}"></script>
</body>
</html>