<?php

namespace App\Http\Controllers;

use App\Models\KriteriaSekolah;
use App\Models\KriteriaYayasan;
use App\Models\User;
use PHPUnit\Util\Type;

class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $user = User::get();
        $kriteria_sekolah = KriteriaSekolah::get();
        $kriteria_yayasan = KriteriaYayasan::get();
        $alternatif = 0;
        foreach ($user as $key => $value) {
            if ($value->validasi == 1) {
                $alternatif++;
            }
        }

        return view('home', ['user' => $user, 'kriteria_sekolah' => $kriteria_sekolah, 'kriteria_yayasan' => $kriteria_yayasan, 'alternatif' => $alternatif]);
    }
}
