@extends('be.layouts.template')

@section('content')
    <div class="pb-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="m-0" style="font-weight: 400;">Halaman</h6>
            <h3 class="m-0" style="font-weight: 600;">Dashboard</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ikon besar -->
                        <i class="bi bi-people-fill fs-2 me-3"></i>
                        <div>
                            <!-- Judul -->
                            <h5 class="card-title mb-0" style="font-weight: 500;">Total Mahasiswa</h5>
                            <!-- Isi -->
                            <p class="card-text">{{ $totalMahasiswa }} Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ikon besar -->
                        <i class="bi bi-person-fill fs-2 me-3"></i>
                        <div>
                            <!-- Judul -->
                            <h5 class="card-title mb-0" style="font-weight: 500;">Laki - Laki</h5>
                            <!-- Isi -->
                            <p class="card-text">{{ $total_laki_laki }} Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ikon besar -->
                        <i class="bi bi-person-fill fs-2 me-3"></i>
                        <div>
                            <!-- Judul -->
                            <h5 class="card-title mb-0" style="font-weight: 500;">Perempuan</h5>
                            <!-- Isi -->
                            <p class="card-text">{{ $total_perempuan }} Mahasiswi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 600;">Selamat Datang di Aplikasi Data Mahasiswa</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
            </div>
        </div>
    </div>

@endsection
