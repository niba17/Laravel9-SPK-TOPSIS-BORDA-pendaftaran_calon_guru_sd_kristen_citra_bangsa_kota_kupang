<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use Illuminate\Http\Request;
use App\Models\HasilPerhitungan;
use App\Models\HasilAdministrasi;

class PengumumanController extends Controller
{
    public function index(Type $var = null)
    {
        $administrasi = HasilAdministrasi::get();
        $perhitungan = HasilPerhitungan::get();
        return view('pengumuman', ['administrasi' => $administrasi, 'perhitungan' => $perhitungan]);
    }
}