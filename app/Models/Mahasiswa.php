<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nim', 'foto_mahasiswa', 'nama', 'jenis_kelamin', 'jurusan', 'alamat', 'tanggal_lahir', 'usia'];
    protected $table = 'mahasiswa';
    public $timestamps = true;
}
