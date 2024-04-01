<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use PHPUnit\Util\Type;
use App\Models\BobotSekolah;
use App\Models\BobotYayasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BobotController extends Controller
{
    public function index(Type $var = null)
    {
        $bobotSekolah = BobotSekolah::get();
        $bobotYayasan = BobotYayasan::get();
        // dd($bobot->all());

        return view('bobot', ['bobotSekolah' => $bobotSekolah, 'bobotYayasan' => $bobotYayasan]);
    }

    public function create($table)
    {
        return view('add.bobot-add', ['table' => $table]);
    }

    public function store(Request $request, $table)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:' . $table . '|max:50|required';
        $messages['nama.unique'] = 'Nama bobot sudah ada!';
        $messages['nama.max'] = 'Nama bobot tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama bobot wajib diisi!';

        $rules['bobot'] = 'max:50|required';
        $messages['bobot.max'] = 'Bobot tidak boleh lebih dari :max karakter!';
        $messages['bobot.required'] = 'Bobot wajib diisi!';

        $request->validate($rules, $messages);

        if ($table == 'bobot_sekolah') {
            # code...
            $bobotStore = BobotSekolah::create($request->all());
        } else {
            # code...
            $bobotStore = BobotYayasan::create($request->all());
        }


        if ($bobotStore) {
            Session::flash('succMessage', 'Bobot berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Bobot gagal ditambahkan!');
        }

        return redirect('/bobot');
    }

    public function edit($id, $table)
    {
        if ($table == 'bobot_sekolah') {
            # code...
            $bobot = BobotSekolah::findOrFail($id);
        } else {
            # code...
            $bobot = BobotYayasan::findOrFail($id);
        }


        //  dd($bobot->all());

        return view('edit.bobot-edit', ['bobot' => $bobot, 'table' => $table]);
    }

    public function update(Request $request, $id, $table)
    {
        $rules = [];
        $messages = [];

        // dd($id);
        if ($table == 'bobot_sekolah') {
            # code...
            $bobot = BobotSekolah::findOrFail($id);
        } else {
            # code...
            $bobot = BobotYayasan::findOrFail($id);
        }

        if ($request->nama != $bobot->nama) {
            $rules['nama'] = 'unique:' . $table . '|max:50|required';
            $messages['nama.unique'] = 'Nama Bobot Sudah ada!';
            $messages['nama.required'] = 'Nama bobot wajib Diisi!';
            $messages['nama.max'] = 'Nama Bobot tidak boleh lebih dari :max karakter!';
        }

        if ($request->bobot != $bobot->bobot) {
            $rules['bobot'] = 'max:50|required';
            $messages['bobot.required'] = 'Bobot wajib Diisi!';
            $messages['bobot.max'] = 'Bobot tidak boleh lebih dari :max karakter!';
        }


        $request->validate($rules, $messages);

        $bobotUp = $bobot->update($request->all());


        if ($bobotUp) {
            Session::flash('succMessage', 'Bobot berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Bobot gagal diubah!');
        }

        return redirect('/bobot');
    }

    public function destroy($id, $table)
    {
        if ($table == 'bobot_sekolah') {
            # code...
            $bobot = BobotSekolah::findOrFail($id);
        } else {
            # code...
            $bobot = BobotYayasan::findOrFail($id);
        }
        $bobotDestroy = $bobot->delete();

        if ($bobotDestroy) {
            Session::flash('succMessage', 'Bobot berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Bobot gagal dihapus!');
        }

        return redirect('/bobot');
    }
}