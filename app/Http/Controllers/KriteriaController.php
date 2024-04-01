<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\KriteriaSekolah;
use App\Models\KriteriaYayasan;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    public function index(Type $var = null)
    {
        $kriteriaSekolah = KriteriaSekolah::get();
        $kriteriaYayasan = KriteriaYayasan::get();
        // dd($kriteria->all());
        return view('kriteria', ['kriteriaSekolah' => $kriteriaSekolah, 'kriteriaYayasan' => $kriteriaYayasan]);
    }

    public function create($table)
    {
        // dd($table);
        return view('add.kriteria-add', ['table' => $table]);
    }

    public function store(Request $request, $table)
    {
        // dd($table);
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:' . $table . '|max:50|required';
        $messages['nama.unique'] = 'Nama kriteria sudah ada!';
        $messages['nama.max'] = 'Nama kriteria tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama kriteria wajib diisi!';

        $rules['role'] = 'max:50|required';
        $messages['role.max'] = 'Benefit / Cost tidak boleh lebih dari :max karakter!';
        $messages['role.required'] = 'Benefit / Cost wajib diisi!';

        $rules['bobot'] = 'max:100|lte:100|lte:5|gte:1|required';
        $messages['bobot.max'] = 'Karakter bobot tidak boleh lebih dari :max karakter!';
        $messages['bobot.required'] = 'Bobot wajib diisi!';
        $messages['bobot.lte'] = 'Total Bobot harus lebih kecil atau sama dengan 5!';
        $messages['bobot.gte'] = 'Total Bobot harus lebih besar dari 0!';

        $request->validate($rules, $messages);

        if ($table == 'kriteria_sekolah') {
            $kriteriaStore = KriteriaSekolah::create($request->all());
        } else {
            $kriteriaStore = KriteriaYayasan::create($request->all());
        }

        if ($kriteriaStore) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria');
    }

    public function edit($id, $table)
    {
        // dd($table);
        if ($table == 'kriteria_sekolah') {
            $kriteria = KriteriaSekolah::findOrFail($id);
        } else {

            $kriteria = KriteriaYayasan::findOrFail($id);
        }


        return view('edit.kriteria-edit', ['kriteria' => $kriteria, 'table' => $table]);
    }

    public function update(Request $request, $id, $table)
    {
        // dd($table);
        $rules = [];
        $messages = [];
        // dd($id);
        if ($table == 'kriteria_sekolah') {
            # code...
            $kriteria = KriteriaSekolah::findOrFail($id);
        } else {

            $kriteria = KriteriaYayasan::findOrFail($id);
        }

        if ($request->nama != $kriteria->nama) {
            $rules['nama'] = 'unique:' . $table . '|max:50|required';
            $messages['nama.unique'] = 'Nama Kriteria Sudah ada!';
            $messages['nama.required'] = 'Nama kriteria wajib Diisi!';
            $messages['nama.max'] = 'Nama Kriteria tidak boleh lebih dari :max karakter!';
        }

        if ($request->role != $kriteria->role) {
            $rules['role'] = 'max:50|required';
            $messages['role.required'] = 'Kriteria wajib Diisi!';
            $messages['role.max'] = 'Kriteria tidak boleh lebih dari :max karakter!';
        }

        if ($request->bobot != $kriteria->bobot) {
            $rules['bobot'] = 'max:100|lte:5|gte:1|required';
            $messages['bobot.max'] = 'Karakter bobot tidak boleh lebih dari :max karakter!';
            $messages['bobot.required'] = 'Bobot wajib diisi!';
            $messages['bobot.lte'] = 'Total Bobot harus lebih kecil atau sama dengan dari 5!';
            $messages['bobot.gte'] = 'Total Bobot harus lebih besar dari 0!';
        }

        $request->validate($rules, $messages);

        $kriteriaUp = $kriteria->update($request->all());


        if ($kriteriaUp) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/kriteria');
    }

    public function destroy($id, $table)
    {
        // dd($id);
        if ($table == 'kriteria_sekolah') {
            $kriteria = KriteriaSekolah::findOrFail($id);
        } else {

            $kriteria = KriteriaYayasan::findOrFail($id);
        }
        $kriteriaDestroy = $kriteria->delete();

        if ($kriteriaDestroy) {
            Session::flash('succMessage', 'Bobot berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Bobot gagal dihapus!');
        }

        return redirect('/kriteria');
    }
}