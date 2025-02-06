<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Inventaris Lab Komputer</title>
  <!-- Import Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background dengan gambar yang sudah ada */
    body {
      background: url('/images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      background-position: center top;
      overflow: hidden; /* Mencegah scroll */
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <!-- Container Form Login -->
  <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-md w-full max-w-md mt-10">
    <h2 class="text-2xl font-bold text-red-600 mb-6 text-center">Login</h2>
    
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <!-- Input Email -->
      <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400" />
      </div>
      
      <!-- Input Password -->
      <div class="mb-6">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400" />
      </div>
      
      <!-- Tombol Login -->
      <button type="submit" class="w-full py-3 bg-red-500 text-white rounded-full text-lg font-semibold hover:bg-red-600">
        Login
      </button>
    </form>
    
    <!-- Link ke halaman Welcome -->
    <p class="mt-4 text-center text-gray-600">
      Belum Punya Akun?  
      <a href="{{ route('welcome') }}" class="text-red-600 font-bold">Buat Akun</a>
    </p>
    
    <!-- Pesan error (jika ada) -->
    @if ($errors->any())
      <div class="mt-4 text-center text-red-600 font-bold">
         {{ $errors->first() }}
      </div>
    @endif
  </div>
</body>
</html>
