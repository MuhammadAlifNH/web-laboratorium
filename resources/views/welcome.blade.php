<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- Memanggil Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background yang sudah ada */
    body {
      background: url('/images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      background-position: center top; /* Geser ke atas */
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <!-- Menambahkan kelas margin kiri (ml-16) untuk menggeser container ke kana -->
  <div class="w-full max-w-md p-6 ml-16 bg-white bg-opacity-80 shadow-md rounded-lg">
    <h2 class="text-3xl font-bold text-red-600 mb-6 text-center">Access to the Platform</h2>

    <form action="#" method="POST">
      <!-- Input Username dengan ikon -->
      <div class="relative mb-4">
        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">👤</span>
        <input type="text" placeholder="Username" class="w-full pl-12 pr-4 py-3 bg-red-200 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400" />
      </div>

      <!-- Input Password dengan ikon -->
      <div class="relative mb-4">
        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">👁️‍🗨️</span>
        <input type="password" placeholder="Password" class="w-full pl-12 pr-4 py-3 bg-red-300 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400" />
      </div>

      <!-- Input Konfirmasi Password dengan ikon -->
      <div class="relative mb-6">
        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">👁️‍🗨️</span>
        <input type="password" placeholder="Konfirmasi Password" class="w-full pl-12 pr-4 py-3 bg-red-400 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400" />
      </div>

      <!-- Tombol Sign Up -->
      <button class="w-full py-3 bg-red-500 text-white rounded-full text-lg font-semibold hover:bg-red-600">
        Sign Up
      </button>
    </form>

    <p class="mt-4 text-gray-600 text-center">
      Already Registered? 
      <a href="#" class="text-red-600 font-bold">Login</a>
    </p>
  </div>
</body>
</html>
