@extends('be.layouts.template')

@section('content')

    <!-- START FORM -->
    <form enctype="multipart/form-data" action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="pb-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="m-0" style="font-weight: 400;">Halaman</h6>
            <h3 class="m-0" style="font-weight: 600;">Edit Data Mahasiswa</h3>
        </div>
        <h6 class="m-0" style="font-weight: 400;">Dashboard > Data Mahasiswa > Edit</h6>
    </div>
    <div class="my-0 p-5 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->nim }}" name='nama' id="nama" disabled>

            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->nama }}" name='nama' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->alamat }}" name='alamat' id="alamat" placeholder="Ex: Surakarta, Jebres">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{ $data->tanggal_lahir }}" name='tanggal_lahir' id="tanggal_lahir" placeholder="Ex: 09-02-2003">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value="{{ $data->usia }}" name='usia' id="usia" placeholder="Ex: 11">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->jurusan }}" name='jurusan' id="jurusan">
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
        <div class="mb-0 row">
            <label for="fotomhs" class="col-sm-2 col-form-label">Update Photo</label>
            <div class="col-sm-10">
                <input type="file" class="form-control @error('fotomhs') is-invalid @enderror" value="{{ $data->jenis_kelamin }}" id="fotomhs" name="fotomhs"
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
                <button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
            </div>
        </div>
    </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
