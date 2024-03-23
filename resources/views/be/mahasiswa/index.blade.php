@extends('be.layouts.template')

@section('content')
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="m-0" style="font-weight: 400;">Halaman</h6>
            <h3 class="m-0" style="font-weight: 600;">Data Mahasiswa</h3>
        </div>
        <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i>&nbsp; Tambah Data Mahasiswa</a>
    </div>

    <!-- START DATA -->
    <div class="my-0 p-5 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-2" type="search" name="katakunci" id="searchInput" value="{{ Request::get('katakunci') }}" placeholder="Masukkan katakunci Ex: 300310211 or Dinda or Teknik Informatika" aria-label="Search">
                <!-- Tambahkan id pada tombol untuk referensi dalam jQuery -->
                <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th>NIM</th>
                    <th style="text-align: center;">Foto Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Waktu Daftar</th>
                    <th style="text-align: center; width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                    @if($data->count() > 0)
                    @foreach ($data as $item)
                    <tr>
                        <td style="text-align: center;">{{ $i }}</td>
                        <td>{{ $item->nim }}</td>
                        @if($item->foto_mahasiswa != null || $item->foto_mahasiswa != '')
                            <td style="text-align: center;"><a target="_blank" href="{{ url('pictures').'/'.$item->foto_mahasiswa }}"><img src="{{ url('pictures').'/'.$item->foto_mahasiswa }}" style="max-width: 25px; max-height: 25px; border-radius: 50%;"></a></td>
                        @else
                            <td style="text-align: center;"><img src="{{ asset('img/default-profile.png') }}" style="max-width: 25px; max-height: 25px; border-radius: 50%;"></td>
                        @endif
                        <td><a style="text-decoration: none" href="{{ url('mahasiswa/'.$item->nim) }}">{{ $item->nama }}</a></td>
                        @if($item->jenis_kelamin != null || $item->jenis_kelamin != '')
                            <td>{{ $item->jenis_kelamin }}</td>
                        @else
                            <td><strong><i><label style="color:red;">Tidak ada Jenis Kelamin</label></i></strong></td>
                        @endif
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td style="text-align: center;">
                            <a href='{{ url('mahasiswa/'.$item->nim) }}' class="btn btn-secondary btn-sm">Show</a>
                            <a href='{{ url('mahasiswa/'.$item->nim.'/edit') }}' class="btn btn-primary btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')" class="d-inline" action="{{ url('mahasiswa/'.$item->nim) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" name="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" style="text-align: center;">Data tidak ditemukan</td>
                    </tr>
                    @endif
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
    <!-- AKHIR DATA -->
@endsection
