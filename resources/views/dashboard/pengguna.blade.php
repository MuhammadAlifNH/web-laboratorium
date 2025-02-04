<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
</head>
<body>
    <h1>Dashboard Pengguna</h1>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong> :D </p>

    <ul>
        <li><a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a></li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>