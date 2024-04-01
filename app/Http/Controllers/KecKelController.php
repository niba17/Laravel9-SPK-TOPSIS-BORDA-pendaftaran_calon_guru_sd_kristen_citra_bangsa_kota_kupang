<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class KecKelController extends Controller
{
    public function index(Type $var = null)
    {
        $kecamatan = Kecamatan::with(['puskesmas'])->get();
        $kelurahan = Kelurahan::with(['puskesmas'])->get();

        // dd($kelurahan)->all();
        // dd($kelurahan)->all();
        // dd($kecKel);

        return view('kecKel', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function create($controller)
    {
        $kecamatan = Kecamatan::get();
        $puskesmas = Puskesmas::get();
        return view('add.' . $controller . '-add', ['kecamatan' => $kecamatan, 'puskesmas' => $puskesmas]);
    }

    public function store(Request $request, $controller)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        if ($controller == 'kecamatan') {
            $rules['nama'] = 'unique:kecamatan|max:50|required';
            $rules['puskesmas_id'] = 'required';
            $messages['nama.unique'] = 'Kecamatan sudah ada!';
            $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
            $messages['nama.required'] = 'Nama wajib diisi!';
            $messages['puskesmas_id.required'] = 'Puskesmas wajib dipilih!';
        } else {
            $rules['nama'] = 'unique:kelurahan|max:50|required';
            $rules['puskesmas_id'] = 'required';
            $messages['nama.unique'] = 'Kelurahan sudah ada!';
            $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
            $messages['nama.required'] = 'Nama wajib diisi!';
            $messages['puskesmas_id.required'] = 'Puskesmas wajib dipilih!';
        }
        // dd($rules);

        $request->validate($rules, $messages);

        if ($controller == 'kecamatan') {
            $kasus = Kecamatan::create($request->all());
        } else {
            $kasus = Kelurahan::create($request->all());
        }

        if ($kasus) {
            Session::flash('succMessage', ucfirst($controller) . ' berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', ucfirst($controller) . ' gagal ditambahkan!');
        }

        return redirect('/kecKel');
    }

    public function edit($id, $controller)
    {
        $puskesmas = Puskesmas::get();
        if ($controller == 'kecamatan') {
            $kecamatan = Kecamatan::with('puskesmas')->findOrFail($id);

            //  dd($kecamatan->all());

            return view('edit.kecamatan-edit', ['kecamatan' => $kecamatan, 'puskesmas' => $puskesmas]);
        } else {
            $kelurahan = Kelurahan::with('puskesmas', 'kecamatan')->findOrFail($id);
            $kecamatan = Kecamatan::all();
            // dd($kelurahan);
            return view('edit.kelurahan-edit', ['kelurahan' => $kelurahan, 'kecamatan' => $kecamatan, 'puskesmas' => $puskesmas]);
        }
    }

    public function update(Request $request, $id, $controller)
    {
        $rules = [];
        $messages = [];

        if ($controller == 'kecamatan') {
            $kecamatan = Kecamatan::findOrFail($id);

            if ($request->nama != $kecamatan->nama) {
                $rules['nama'] = 'unique:' . $controller . '|max:50|required';
                $messages['nama.unique'] = 'Nama ' . ucfirst($controller) . ' Sudah ada!';
                $messages['nama.required'] = ucfirst($controller) . ' wajib Diisi!';
                $messages['nama.max'] = 'Nama ' . ucfirst($controller) . ' tidak boleh lebih dari :max karakter!';
            }
        } else {
            $kelurahan = Kelurahan::with('puskesmas', 'kecamatan')->findOrFail($id);

            if ($request->nama != $kelurahan->nama) {
                $rules['nama'] = 'unique:' . $controller . '|max:50|required';
                $messages['nama.unique'] = 'Nama ' . ucfirst($controller) . ' Sudah ada!';
                $messages['nama.required'] = ucfirst($controller) . ' wajib Diisi!';
                $messages['nama.max'] = 'Nama ' . ucfirst($controller) . ' tidak boleh lebih dari :max karakter!';
            }
        }

        $request->validate($rules, $messages);

        if ($controller == 'kecamatan') {
            $result = $kecamatan->update($request->all());
        } else {
            $result = $kelurahan->update($request->all());
        }

        if ($result) {
            Session::flash('succMessage', ucfirst($controller) . ' berhasil diubah!');
        } else {
            Session::flash('errMessage', ucfirst($controller) . ' gagal diubah!');
        }

        return redirect('/kecKel');
    }

    public function destroy($id, $controller)
    {
        if ($controller == 'kecamatan') {
            $kecamatan = Kecamatan::findOrFail($id);
            $result = $kecamatan->delete();
        } else {
            $kelurahan = Kelurahan::findOrFail($id);
            $result = $kelurahan->delete();
        }

        if ($result) {
            Session::flash('succMessage', ucfirst($controller) . ' berhasil dihapus!');
        } else {
            Session::flash('errMessage', ucfirst($controller) . ' gagal dihapus!');
        }

        return redirect('/kecKel');
    }
}