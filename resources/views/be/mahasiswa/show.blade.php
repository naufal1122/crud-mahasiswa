@extends('be.layouts.template')

@section('content')

    <!-- START FORM -->
    <div class="pb-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="m-0" style="font-weight: 400;">Halaman</h6>
            <h3 class="m-0" style="font-weight: 600;">Tampilkan Data Mahasiswa</h3>
        </div>
        <h6 class="m-0" style="font-weight: 400;">Dashboard > Data Mahasiswa > Tampilkan</h6>
    </div>
    <div class="my-0 p-5 bg-body rounded shadow-sm">
        <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->nim }}" name='nama' id="nama" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->nama }}" name='nama' id="nama" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->alamat }}" name='alamat' id="alamat" placeholder="Ex: Surakarta, Jebres" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{ $data->tanggal_lahir }}" name='tanggal_lahir' id="tanggal_lahir" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->usia }}" name='usia' id="usia" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->jurusan }}" name='jurusan' id="jurusan" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->jenis_kelamin }}" name='jk' id="jk" placeholder="Anda belum mengisi Jenis Kelamin" readonly>
            </div>
        </div>
        <div class="mb-4 row">
            <label for="fotomhs" class="col-sm-2 col-form-label">Photo Profil</label>
            <div class="col-sm-10">
                @if ($data->foto_mahasiswa != null || $data->foto_mahasiswa != '')
                    <div class="mt-3"><img style="border-radius: 50%;" src="{{ url('pictures').'/'.$data->foto_mahasiswa }}" id="output" width="200"></div>
                @else
                    <div class="mt-3"><img style="border-radius: 50%;" src="{{ asset('img/default-profile.png') }}" id="output" width="200"></div>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <a href="{{ url('mahasiswa') }}" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
    <!-- AKHIR FORM -->
@endsection
