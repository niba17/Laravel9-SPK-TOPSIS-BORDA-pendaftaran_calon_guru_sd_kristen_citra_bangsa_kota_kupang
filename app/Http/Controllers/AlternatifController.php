<?php

namespace App\Http\Controllers;

use App\Models\AlternatifKriteriaSekolah;
use App\Models\AlternatifKriteriaYayasan;
use App\Models\Biodata;
use App\Models\KriteriaSekolah;
use App\Models\KriteriaYayasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class AlternatifController extends Controller
{
    public function index(Type $var = null)
    {
        $alternatif = User::with('biodata')->get();
        // dd($alternatif);
        $kriteriaSekolah = KriteriaSekolah::get();
        $kriteriaYayasan = KriteriaYayasan::get();
        return view('alternatif', ['alternatif' => $alternatif, 'kriteriaSekolah' => $kriteriaSekolah, 'kriteriaYayasan' => $kriteriaYayasan]);
    }

    public function edit($id, $table)
    {
        if ($table == 'alternatif_kriteria_sekolah') {
            $alternatif = Biodata::with('kriteria_sekolah')->findOrFail($id);
            $kriteria = KriteriaSekolah::get();
        } else {
            $alternatif = Biodata::with('kriteria_yayasan')->findOrFail($id);
            $kriteria = KriteriaYayasan::get();
        }

        // dd($alternatif->all());

        return view('edit.alternatif-edit', ['alternatif' => $alternatif, 'kriteria' => $kriteria, 'table' => $table]);
    }

    public function update(Request $request, $id, $table)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $kriteria = [];
        if ($table == 'alternatif_kriteria_sekolah') {
            $kriteria = AlternatifKriteriaSekolah::get();
        } else {
            $kriteria = AlternatifKriteriaYayasan::get();
        }

        //mengambil data yang sesuai $id dari db kolom biodata_id
        $alternatif_kriteria = collect();
        foreach ($kriteria->all() as $item) {
            if ($item->biodata_id == $id) {
                $alternatif_kriteria->push($item);
            }
        }

        // dd($alternatif_kriteria);

        if (count($alternatif_kriteria) < 1) {

            //validasi field khusus data tidak ada dalam db
            $i = 0;
            foreach ($request->all() as $key => $value) {
                if ($key != '_token' && $key != '_method' && $key != 'biodata_id' && $key != 'kriteria_id' && $key != 'bobot_usia') {

                    $rules[$key] = 'required|lte:100|gte:1';
                    $messages[$key . '.required'] = 'Kolom wajib diisi!';
                    $messages[$key . '.gte'] = 'Value minimal adalah 1!';
                    $messages[$key . '.lte'] = 'Value maksimal adalah 100!';
                    $i++;
                } else if ($key == 'bobot_usia') {

                    $rules[$key] = 'required|lte:30|gte:20';
                    $messages[$key . '.required'] = 'Kolom wajib diisi!';
                    $messages[$key . '.gte'] = 'Usia minimal 20 tahun!';
                    $messages[$key . '.lte'] = 'Usia maksimal 30 tahun!';
                    $i++;
                }
            }
        } else {
            $i = 0;
            foreach ($request->all() as $key => $value) {
                if ($key != '_token' && $key != '_method' && $key != 'biodata_id' && $key != 'kriteria_id' && $key != 'bobot_usia') {
                    if (isset($alternatif_kriteria[$i]->bobot) && $value != $alternatif_kriteria[$i]->bobot) {

                        $rules[$key] = 'required|lte:100|gte:1';
                        $messages[$key . '.required'] = 'Kolom wajib diisi!';
                        $messages[$key . '.gte'] = 'Value minimal adalah 1!';
                        $messages[$key . '.lte'] = 'Value maksimal adalah 100!';
                        $i++;
                    }
                } else if ($key == 'bobot_usia') {
                    if (isset($alternatif_kriteria[$i]->bobot) && $value != $alternatif_kriteria[$i]->bobot) {
                        $rules[$key] = 'required|lte:30|gte:20';
                        $messages[$key . '.required'] = 'Kolom wajib diisi!';
                        $messages[$key . '.gte'] = 'Usia minimal 20 tahun!';
                        $messages[$key . '.lte'] = 'Usia maksimal 30 tahun!';
                        $i++;
                    }
                }
            }
        }

        $request->validate($rules, $messages);

        // $array_temp = $request->all();

        $array = $request->all();
        $array_nilai_bobot = [];
        // dd($array);
        //pembobotan
        $i = 0;
        foreach ($array as $key => $value) {
            if ($key != '_token' && $key != '_method' && $key != 'biodata_id' && $key != 'kriteria_id' && $key != 'bobot_usia') {
                if ($value >= 0 && $value < 20) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 1,
                    ];
                } else if ($value >= 20 && $value < 40) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 2,
                    ];
                } else if ($value >= 40 && $value < 60) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 3,
                    ];
                } else if ($value >= 60 && $value < 80) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 4,
                    ];
                } else if ($value >= 80 && $value <= 100) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 5,
                    ];
                }
                $i++;
            } else if ($key == 'bobot_usia') {
                if ($value >= 20 && $value <= 22) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 1,
                    ];
                } else if ($value > 22 && $value <= 24) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 2,
                    ];
                } else if ($value > 24 && $value <= 26) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 3,
                    ];
                } else if ($value > 26 && $value <= 28) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 4,
                    ];
                } else if ($value > 28 && $value <= 30) {
                    $array_nilai_bobot[$i] = [
                        'nilai' => $value,
                        'bobot' => 5,
                    ];
                }
                $i++;
            }
        }

        // dd($array_nilai_bobot);

        //menyalin bobot field ke $array['boot]
        $i = 0;
        foreach ($array_nilai_bobot as $key => $value) {
            if ($key != '_token' && $key != '_method' && $key != 'biodata_id' && $key != 'kriteria_id') {
                $array['nilai'][$i] = $value['nilai'];
                $array['bobot'][$i] = $value['bobot'];
                $i++;
            }
        }

        // dd($array);

        //update / add $array ke db
        $alternatif_kriteria = collect();
        foreach ($kriteria->all() as $item) {
            if ($item->biodata_id == $id) {
                $alternatif_kriteria->push($item);
            }
        }
        $alternatifUp = '';
        $alternatifAdd = '';
        $i = 0;
        $j = 0;
        foreach ($array['kriteria_id'] as $key => $value) {
            if ($table == 'alternatif_kriteria_sekolah') {

                //cek jika kriteria merupakan kriteria baru
                if (empty($alternatif_kriteria[$j]->kriteria_id)) {
                    $alternatifUp = AlternatifKriteriaSekolah::create([
                        'biodata_id' => $array['biodata_id'],
                        'kriteria_id' => $array['kriteria_id'][$i],
                        'nilai' => $array['nilai'][$i],
                        'bobot' => $array['bobot'][$i],
                    ]);
                } else {
                    $alternatifUp = AlternatifKriteriaSekolah::where('biodata_id', $array['biodata_id'])
                        ->where('kriteria_id', $value)
                        ->update([
                            'nilai' => $array['nilai'][$i],
                            'bobot' => $array['bobot'][$i],
                        ]);
                }
                $i++;
            } else {

                //cek jika kriteria merupakan kriteria baru
                if (empty($alternatif_kriteria[$j]->kriteria_id)) {
                    $alternatifUp = AlternatifKriteriaYayasan::create([
                        'biodata_id' => $array['biodata_id'],
                        'kriteria_id' => $array['kriteria_id'][$i],
                        'nilai' => $array['nilai'][$i],
                        'bobot' => $array['bobot'][$i],
                    ]);
                } else {
                    $alternatifUp = AlternatifKriteriaYayasan::where('biodata_id', $array['biodata_id'])
                        ->where('kriteria_id', $value)
                        ->update([
                            'nilai' => $array['nilai'][$i],
                            'bobot' => $array['bobot'][$i],
                        ]);
                }
                $i++;
            }
            $j++;
        }

        if ($alternatifUp || $alternatifAdd) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/alternatif');
    }
}
