<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use Illuminate\Http\Request;

class DataKasusController extends Controller
{
    public function index($tahun)
    {
        $dataKasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();

        if ($tahun == null) {
            $tahun = 2021;
        }

        foreach ($dataKasus as $key => $value) {
            if ($value->tahun != $tahun) {
                unset($dataKasus[$key]);
            }
        }

        return view('dataKasus', ['dataKasus' => $dataKasus, 'tahun' => $tahun]);
    }
}