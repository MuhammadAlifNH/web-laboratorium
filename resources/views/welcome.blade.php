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
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen px-10">

  <!-- Container utama dengan grid -->
  <div class="grid grid-cols-2 gap-12 w-full max-w-6xl">
    
    <!-- Bagian Visi & Misi -->
    
     
      
    <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-md max-w-lg mt-20 mx-auto">
        <h3 class="text-center font-bold text-gray-800">Visi dan Misi</h3>
        <h3 class="text-center font-bold text-gray-800">Fakultas Sains dan Teknologi</h3>
        <h4 class="text-md font-semibold text-gray-700 mt-2">Visi:</h4>
        <p class="text-gray-700">
          Menjadi Fakultas Sains dan Teknologi yang Unggul dalam Pengembangan IPTEK, Seni, dan Budaya
          serta Sumber Daya Manusia Cendekia, Berakhlakul Karimah, dan Berkepribadian Ahlussunnah Wal Jama’ah
          pada Tahun 2028.
        </p>

        <h4 class="text-md font-semibold text-gray-700 mt-4">Misi:</h4>
        <ul class="list-decimal ml-6 text-gray-700">
          <li>Menyelenggarakan pendidikan unggul dalam bidang Sains dan Teknologi sehingga menghasilkan Lulusan yang memiliki keunggulan kompetitif, beretika dan bermoral (akhlaqul karimah).</li>
          <li>Mengembangkan ilmu pengetahuan dan teknologi terutama melalui kegiatan penelitian yang bermutu,publikasi ilmiah,serta kepemilikan Hak atas kekayaan intelektual (HAKI) sebagai upaya pengembangan ilmu pengetahuan,kerekayasan dan Teknologi.</li>
          <li>Melaksanakan pengabdian kepada masyarakat untuk memecahkan persoalan masyarakat sebagai upaya penerapandan pengembangan ilmu pengetahuan,sains,dan Teknologi.</li>
          <li>Melakukan evaluasi secara teratur untuk meningkatkan kualitas,profesionalitas,kapabilitas,akuntabilitas,dan tata kelola serta kemandirian dalam penyelenggaraan instansi.</li>
        </ul>
      </div>
    </div>

    <!-- Bagian Login -->
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-md w-full max-w-md ml-auto">
      <h2 class="text-2xl font-bold text-red-600 mb-6 text-center">Access to the Platform</h2>

      <!-- Form Register (Di halaman Welcome) -->
    

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
  $(document).ready(function() {
    $('#registerForm').submit(function(event) {
      event.preventDefault();

      $.ajax({
        url: "{{ route('register') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
          $('#registerMessage').html('<p class="text-green-600">Registrasi Berhasil! Mengalihkan ke login...</p>');
          $('#registerForm')[0].reset();
          
          // Redirect ke halaman login setelah 2 detik
          setTimeout(function() {
            window.location.href = "{{ route('login') }}";
          }, 2000);
        },
        error: function(xhr) {
          let errors = xhr.responseJSON.errors;
          let errorMessage = Object.values(errors).map(err => `<p class="text-red-600">${err}</p>`).join('');
          $('#registerMessage').html(errorMessage);
        }
      });
    });
  });
</script>


      

      </p>
    </div>

  </div>

</body>
</html>
