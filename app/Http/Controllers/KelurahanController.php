<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelurahanController extends Controller
{
    public function index(Type $var = null)
    {
        $kelurahan = Kelurahan::with(['puskesmas'])->get();

        // dd($kelurahan)->all();
        // dd($kelurahan)->all();
        // dd($kecKel);

        return view('kelurahan', ['kelurahan' => $kelurahan]);
    }

    public function create()
    {
        $kelurahan = Kelurahan::get();
        $puskesmas = Puskesmas::get();
        return view('add.kelurahan-add', ['kelurahan' => $kelurahan, 'puskesmas' => $puskesmas]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:kelurahan|max:50|required';
        // $rules['puskesmas_id'] = 'required';
        $messages['nama.unique'] = 'Kelurahan sudah ada!';
        $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama wajib diisi!';
        // $messages['puskesmas_id.required'] = 'Puskesmas wajib dipilih!';

        $request->validate($rules, $messages);

        $kasus = Kelurahan::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Kelurahan berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal ditambahkan!');
        }

        return redirect('/kelurahan');
    }

    public function edit($id)
    {
        $puskesmas = Puskesmas::get();
        $kelurahan = Kelurahan::with('puskesmas')->findOrFail($id);

        //  dd($kelurahan->all());

        return view('edit.kelurahan-edit', ['kelurahan' => $kelurahan, 'puskesmas' => $puskesmas]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kelurahan = Kelurahan::findOrFail($id);

        if ($request->nama != $kelurahan->nama) {
            $rules['nama'] = 'unique:kelurahan|max:50|required';
            $messages['nama.unique'] = 'Nama Kelurahan Sudah ada!';
            $messages['nama.required'] = 'Kelurahan wajib Diisi!';
            $messages['nama.max'] = 'Nama Kelurahan tidak boleh lebih dari :max karakter!';
        }


        $request->validate($rules, $messages);

        $result = $kelurahan->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Kelurahan berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal diubah!');
        }

        return redirect('/kelurahan');
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $result = $kelurahan->delete();

        if ($result) {
            Session::flash('succMessage', 'Kelurahan berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal dihapus!');
        }

        return redirect('/kelurahan');
    }
}