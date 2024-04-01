<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class KasusController extends Controller
{
    public function index($tahun = null)
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();

        if ($tahun == null) {
            $tahun = 2021;
        }

        foreach ($kasus as $key => $value) {
            if ($value->tahun != $tahun) {
                unset($kasus[$key]);
            }
        }

        return view('kasus', ['kasus' => $kasus, 'tahun' => $tahun]);
    }

    public function create()
    {
        $puskesmas = Puskesmas::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('add.kasus-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'puskesmas' => $puskesmas]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $kasus = Kasus::with('kelurahan')->get();
        // dd($kasus);

        foreach ($kasus as $key) {
            if ($request->kelurahan_id == $key->kelurahan_id) {
                if ($request->tahun == $key->tahun) {
                    Session::flash('errMessage', 'Data Kelurahan ' . $key->kelurahan->nama . ' Tahun ' . $key->tahun . ' Sudah Ada!');
                    return redirect('/kasus-add');
                }
            }
        }
        // die;

        $rules = [
            'kelurahan_id' => 'required',
            'sasaran' => 'max:10|required',
            'j_b_diukur' => 'max:10|required',
            's_pendek' => 'max:10|required',
            'pendek' => 'max:10|required',
            'normal' => 'max:10|required',
            'tinggi' => 'max:10|required',
            'total' => 'max:10|required',
            'presentase' => 'max:10|required',
            'tahun' => 'max:10|required',
        ];

        $messages = [
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
            'sasaran.required' => 'Sasaran wajib diisi!',
            'j_b_diukur.required' => 'Jumlah balita wajib diisi!',
            's_pendek.required' => 'Status Gizi wajib diisi!',
            'pendek.required' => 'Status Gizi wajib diisi!',
            'normal.required' => 'Status Gizi wajib diisi!',
            'tinggi.required' => 'Status Gizi wajib diisi!',
            'total.required' => 'Total wajib diisi!',
            'presentase.required' => 'Presentase wajib diisi!',
            'tahun.required' => 'Tahun wajib diisi!',
            'sasaran.max' => 'Sasaran tidak boleh lebih dari :max karakter!',
            'j_b_diukur.max' => 'Jumlah balita tidak boleh lebih dari :max karakter!',
            's_pendek.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'pendek.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'normal.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'tinggi.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'total.max' => 'Total tidak boleh lebih dari :max karakter!',
            'presentase.max' => 'Presentase tidak boleh lebih dari :max karakter!',
            'tahun.max' => 'Tahun tidak boleh lebih dari :max karakter!',
        ];

        $request->validate($rules, $messages);
        // dd($request->all());
        $kasus = Kasus::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Kasus berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kasus gagal ditambahkan!');
        }

        return redirect('/kasus/2021');
    }

    public function edit($id)
    {
        $kasus = Kasus::with(['puskesmas', 'kecamatan', 'kelurahan'])->findOrFail($id);

        $puskesmas = Puskesmas::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        //  dd($kasus->all());

        return view('edit.kasus-edit', ['kasus' => $kasus, 'puskesmas' => $puskesmas, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);

        $rules = [];

        $messages = [];

        if ($request->kelurahan_id != $kasus->kelurahan_id) {
            $rules['kelurahan_id'] = 'unique:kasus';
            $messages['kelurahan_id.unique'] = 'Kelurahan sudah ada!';
        }
        $validator = false;
        foreach ($request->all() as $key => $value) {
            if ($key == 'sasaran') {
                $validator = true;
            }
            if ($key == 'geojson') {
                $validator = false;
            }

            if ($validator == true) {
                if ($value != $kasus[$key]) {
                    $rules[$key] = 'max:10|required';
                    $messages[$key . '.max'] = 'Karakter tidak boleh lebih dari :max';
                    $messages[$key . '.required'] = 'Kolom wajib Diisi!';
                }
            }
        }

        $request->validate($rules, $messages);

        $kasusUp = $kasus->update($request->all());

        if ($kasusUp) {
            Session::flash('succMessage', 'Data kasus berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Data kasus gagal diubah!');
        }

        return redirect('/kasus/2021');
    }

    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus = $kasus->delete();

        if ($kasus) {
            Session::flash('succMessage', 'Data kasus berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Data kasus gagal dihapus!');
        }

        return redirect('/kasus');
    }
}