<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link rel="shortcut icon" href="{{ asset('img/database.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
      /* Custom styles for Tabler.io navbar */
      .navbar-dark {
        background-color: #324444;
      }
      .navbar-brand {
        color: #fff;
      }
      .nav-link {
        color: #ccc;
      }
      .nav-link:hover {
        color: #fff;
      }
      .navbar-toggler {
        border-color: #ccc;
      }
      .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
      }
      body {
        font-family: 'Work Sans', sans-serif;
    }
    .active-menu {
        border-bottom: 2px solid #324444    ; /* Garis bawah menu yang aktif */
    }
    </style>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid" style="margin-left: 15px; margin-right: 15px;">
        <a class="navbar-brand" href="#" style="font-weight: 600;">DATA MAHASISWA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="d-flex align-items-center">
                    <img src="{{ asset('img/team/team-1.jpg') }}" alt="User Icon" class="rounded-circle me-2" width="50" height="auto">
                    <div style="font-size: 14px; color:white;">
                        User Login <br>
                        Mahasiswa Role
                        <span class="visually-hidden"> (User Login)</span>
                    </div>
                    </div>
                </a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid" style="margin-left: 5px; margin-right: 5px;">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item me-1">
                        <a class="nav-link text-dark {{ Request::is('dashboard') ? 'active-menu' : '' }}" href="{{ url('dashboard') }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link text-dark {{ Request::is('mahasiswa') ? 'active-menu' : '' }}" href="{{ url('mahasiswa') }}">
                            <i class="bi bi-person"></i> Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link text-dark {{ Request::is('pengguna') ? 'active-menu' : '' }}" href="#}">
                            <i class="bi bi-people"></i> Pengguna
                        </a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link text-dark {{ Request::is('setting') ? 'active-menu' : '' }}" href="#">
                            <i class="bi bi-gear"></i> Setting
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="fluid mx-4 my-4">
        @include('be.components.pesan')

        @yield('content')

        @include('be.components.footer')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk mengirim permintaan pencarian
            function search(keyword) {
                // Redirect ke URL dengan parameter pencarian
                window.location.href = "{{ url('mahasiswa') }}?katakunci=" + keyword;
            }

            // Saat isi input berubah
            $('#searchInput').on('input', function() {
                // Ambil nilai input
                var katakunci = $(this).val();
                // Panggil fungsi pencarian jika katakunci tidak kosong
                if (katakunci.trim() != '') {
                    search(katakunci);
                } else {
                    // Jika kosong, hapus parameter pencarian dari URL
                    var currentUrl = window.location.href;
                    var newUrl = currentUrl.split('?')[0]; // Ambil bagian URL sebelum tanda tanya
                    window.location.href = newUrl; // Redirect tanpa parameter pencarian
                }
            });
        });
    </script>
  </body>
</html>
