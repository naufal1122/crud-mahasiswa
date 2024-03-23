@extends('be.layouts.template')

@section('content')

    <!-- START FORM -->
    <form action='{{ url('mahasiswa') }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="pb-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="m-0" style="font-weight: 400;">Halaman</h6>
            <h3 class="m-0" style="font-weight: 600;">Tambah Data Mahasiswa</h3>
        </div>
        <h6 class="m-0" style="font-weight: 400;">Dashboard > Data Mahasiswa > Tambah</h6>
    </div>
    <div class="my-0 p-5 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input class="form-control" value="{{ Session::get('nim') }}" name='nim' id="nim" placeholder="Ex: 311310300">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ Session::get('nama') }}" name='nama' id="nama" placeholder="Ex: Winda Ayunda">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ Session::get('alamat') }}" name='alamat' id="alamat" placeholder="Ex: Surakarta, Jebres">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{ Session::get('tanggal_lahir') }}" name='tanggal_lahir' id="tanggal_lahir" placeholder="Ex: 09-02-2003">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value="{{ Session::get('usia') }}" name='usia' id="usia" placeholder="Ex: 11">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ Session::get('jurusan') }}" name='jurusan' id="jurusan" placeholder="Ex: Teknik Informatika">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-select" name="jk" id="jk">
                    <option value="Laki-laki" {{ (Session::get('jk') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (Session::get('jk') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="row">
            <label for="fotomhs" class="col-sm-2 col-form-label">Foto Mahasiswa</label>
            <div class="col-sm-10">
                <input type="file" class="form-control @error('fotomhs') is-invalid @enderror" value="{{ Session::get('fotomhs') }}" id="fotomhs" name="fotomhs"
                accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                @error('fotomhs')
                    <span class="invalid-feedback" role="alert">
                        <strong>Error load image</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <div class="mt-3"><img style="border-radius: 50%;" src="{{ asset('img/default-profile.png') }}" id="output" width="200"></div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <a href="{{ url('mahasiswa') }}" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
            </div>
        </div>
    </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
