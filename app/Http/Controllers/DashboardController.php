<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $total_laki_laki = Mahasiswa::where('jenis_kelamin', 'Laki-Laki')->count();
        $total_perempuan = Mahasiswa::where('jenis_kelamin', 'Perempuan')->count();

        return view('be.dashboard', compact('totalMahasiswa', 'total_laki_laki', 'total_perempuan'));
    }
}
