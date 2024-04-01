<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index(Request $request)
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();
        // dd($kasus);
        return view('peta', ['kasus' => $kasus]);
    }

    public function request()
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();

        return response()->json($kasus);
    }
}