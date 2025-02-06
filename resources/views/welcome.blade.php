<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Inventaris Lab Komputer</title>
  <!-- Import Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background tetap sesuai yang sudah ada */
    body {
      background: url('/images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      background-position: center top;
      overflow: hidden; /* Mencegah scroll */
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <!-- Container utama dengan flexbox -->
  <div class="flex w-full max-w-6xl h-[80vh] gap-12">
    
    <!-- Bagian Visi & Misi -->
    <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-md flex-1 flex flex-col justify-center">
      <h3 class="text-center font-bold text-gray-800 text-lg">Visi dan Misi</h3>
      <h3 class="text-center font-bold text-gray-800">Fakultas Sains dan Teknologi</h3>
      
      <h4 class="text-md font-semibold text-gray-700 mt-2">Visi:</h4>
      <p class="text-gray-700 text-sm leading-relaxed">
          Menjadi Fakultas Sains dan Teknologi yang Unggul dalam Pengembangan IPTEK, Seni, dan Budaya
          serta Sumber Daya Manusia Cendekia, Berakhlakul Karimah, dan Berkepribadian Ahlussunnah Wal Jama’ah
          pada Tahun 2028.
      </p>

      <h4 class="text-md font-semibold text-gray-700 mt-4">Misi:</h4>
      <ul class="list-decimal ml-6 text-gray-700 text-sm leading-relaxed">
        <li>Menyelenggarakan pendidikan unggul dalam bidang Sains dan Teknologi sehingga menghasilkan Lulusan
           yang memiliki keunggulan kompetitif, beretika dan bermoral (akhlaqul karimah).</li>
        <li>Mengembangkan ilmu pengetahuan dan teknologi terutama melalui kegiatan penelitian yang bermutu,
          publikasi ilmiah,serta kepemilikan Hak atas kekayaan intelektual (HAKI) sebagai upaya pengembangan ilmu pengetahuan,kerekayasan dan Teknologi.</li>
        <li>Melaksanakan pengabdian kepada masyarakat untuk memecahkan persoalan masyarakat sebagai upaya penerapandan pengembangan ilmu pengetahuan,sains,dan Teknologi.</li>
        <li>Melakukan evaluasi secara teratur untuk meningkatkan kualitas,profesionalitas,kapabilitas,akuntabilitas,dan tata kelola serta kemandirian dalam penyelenggaraan instansi.
        </li>

      </ul>
    </div>

    <!-- Bagian Login -->
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-md flex-1 flex flex-col justify-center">
      <h2 class="text-2xl font-bold text-red-600 mb-6 text-center">Access to the Platform</h2>

      <!-- Form Register -->
      <form id="registerForm">
        @csrf
        <div class="relative mb-4">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">👤</span>
          <input type="text" name="name" placeholder="Nama" class="w-full pl-12 pr-4 py-3 bg-red-200 rounded-full text-gray-700" required />
        </div>

        <div class="relative mb-4">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">📧</span>
          <input type="email" name="email" placeholder="Email" class="w-full pl-12 pr-4 py-3 bg-red-200 rounded-full text-gray-700" required />
        </div>

        <div class="relative mb-4">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">🔒</span>
          <input type="password" name="password" placeholder="Password" class="w-full pl-12 pr-4 py-3 bg-red-300 rounded-full text-gray-700" required />
        </div>

        <div class="relative mb-6">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-xl">🔒</span>
          <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full pl-12 pr-4 py-3 bg-red-400 rounded-full text-gray-700" required />
        </div>

        <button type="submit" class="w-full py-3 bg-red-500 text-white rounded-full text-lg font-semibold hover:bg-red-600">
          Register
        </button>

        <p class="mt-4 text-gray-600 text-center">
          Already Registered?  
          <a href="{{ route('login') }}" class="text-red-600 font-bold">Login</a>
        </p>
      </form>

      <!-- Notifikasi -->
      <div id="registerMessage" class="mt-4 text-center font-bold"></div>
    </div>

  </div>

  <!-- Script AJAX untuk Register -->
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm").addEventListener("submit", function (event) {
      event.preventDefault();

      fetch("{{ route('register') }}", {
        method: "POST",
        body: new FormData(this),
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.getElementById("registerMessage").innerHTML = '<p class="text-green-600">Registrasi Berhasil! Mengalihkan ke login...</p>';
          setTimeout(() => {
            window.location.href = "{{ route('login') }}";
          }, 2000);
        } else {
          let errors = Object.values(data.errors).map(err => `<p class="text-red-600">${err}</p>`).join('');
          document.getElementById("registerMessage").innerHTML = errors;
        }
      })
      .catch(error => console.error("Error:", error));
    });
  });
  </script>

</body>
</html>
