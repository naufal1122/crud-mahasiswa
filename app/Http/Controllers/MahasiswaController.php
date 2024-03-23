<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Mahasiswa as ModelMhs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $data = ModelMhs::where('nim', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('jenis_kelamin', 'like', "%$katakunci%")
            ->orWhere('jurusan', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);

        } else {
            $data = ModelMhs::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }

        return view('be.mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('jk', $request->jk);
        Session::flash('alamat', $request->alamat);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('usia', $request->usia);

        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'usia' => 'required',
            'fotomhs' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'nim.required' => 'NIM harus diisi',
            //'nim.numeric' => 'NIM harus berisikan Angka',
            'nim.unique' => 'NIM sudah terdaftar di database!',

            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'jk.required' => 'Anda harus memilih Jenis Kelamin',
            'alamat.required' => 'Alamat harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'usia.required' => 'Usia harus diisi',
            'fotomhs' => 'Anda harus memilih foto mahasiswa',
            'fotomhs.mimes' => 'Foto hanya di perbolehkan yang berekstensi jpeg, jpg, png atau gif!'
        ]);

        $foto_file = $request->file('fotomhs');
        $foto_ext = $foto_file->extension();
        $rename_foto = date('ymdhis').".".$foto_ext;
        $foto_file->move(public_path('pictures'), $rename_foto);

        $data = [
            'nim' => $request->nim,
            'foto_mahasiswa' => $rename_foto,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia
        ];
        ModelMhs::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data Mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ModelMhs::where('nim', $id)->first();

        if (!$data) {
            return redirect()->route('mahasiswa.index')->with('error', 'Data Mahasiswa tidak ditemukan.');
        }

        return view('be.mahasiswa.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelMhs::where('nim', $id)->first();
        return view('be.mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            //'usia' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'jk.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            //'usia.required' => 'Usia harus diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia
        ];

        if ($request->hasFile('fotomhs')) {
            $request->validate([
                'fotomhs' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'fotomhs' => 'Anda harus memilih foto mahasiswa',
                'fotomhs.mimes' => 'Foto hanya di perbolehkan yang berekstensi jpeg, jpg, png atau gif!'
            ]);

            $foto_file = $request->file('fotomhs');
            $foto_ext = $foto_file->extension();
            $rename_foto = 'update-'.date('ymdhis').".".$foto_ext;
            $foto_file->move(public_path('pictures'), $rename_foto); // Sudah terupload ke direktori

            $data_foto = ModelMhs::where('nim', $id)->first();
            File::delete(public_path('pictures').'/'.$data_foto->foto_mahasiswa);

            $data['foto_mahasiswa'] = $rename_foto;
        }


        ModelMhs::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan perubahan data Mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataReadyDel = ModelMhs::where('nim', $id)->first();
        File::delete(public_path('pictures').'/'.$dataReadyDel->foto_mahasiswa);

        ModelMhs::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menghapus data Mahasiswa');
    }
}
