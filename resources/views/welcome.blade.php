<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang di Web Laboratorium</h1>
        <p class="text-gray-600 mb-6">Silakan Login atau Register untuk melanjutkan.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Login</a>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Register</a>
        </div>
    </div>
</body>
</html>
