<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\HasilPerhitungan;
use App\Models\KriteriaSekolah;
use App\Models\KriteriaYayasan;
use App\Models\Kuota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class PerhitunganController extends Controller
{
    public function validation(Type $var = null)
    {
        $alternatif = User::with('biodata')->get();
        $kriteriaSekolah = KriteriaSekolah::get();
        $kriteriaYayasan = KriteriaYayasan::get();
        $sekolah = true;
        $yayasan = true;

        $i = 0;
        foreach ($alternatif as $key => $value) {
            if ($value->role != 0 && $value->validasi == 1) {
                # code...

                if (count($value->biodata->kriteria_sekolah) < count($kriteriaSekolah)) {
                    $sekolah = false;
                }
                if (count($value->biodata->kriteria_yayasan) < count($kriteriaYayasan)) {
                    $yayasan = false;
                }
                $i++;
            }
        }

        if ($i < 2) {
            Session::flash('errMessage', 'Alternatif yang valid harus lebih dari 1!');
            return redirect('/member');
        }

        if (count($kriteriaSekolah) < 2) {
            Session::flash('errMessage', 'Kriteria sekolah minimal adalah 2!');
            return redirect('/kriteria');
        }

        if (count($kriteriaYayasan) < 2) {
            Session::flash('errMessage', 'Kriteria yayasan minimal adalah 2!');
            return redirect('/kriteria');
        }

        if ($sekolah == true && $yayasan == true) {
            return redirect('/perhitungan-result');
        } else {
            Session::flash('errMessage', 'Data bobot alternatif belum dilengkapi!');
            return redirect('/alternatif');
        }
    }

    public function topsis(Type $var = null)
    {
        $user = User::get();
        $alternatif_sample = Biodata::with(['kriteria_sekolah', 'kriteria_yayasan'])->get();
        $kriteriaSekolah = KriteriaSekolah::get();
        $kriteriaYayasan = KriteriaYayasan::get();

        //membuat array terindex
        $alternatif_sample2 = [];
        foreach ($alternatif_sample as $key => $value) {
            $alternatif_sample2[$key] = $value;
        }

        //menambahkan index 'validasi' dan mengeliminasi yang tidak valid
        $i = 0;
        foreach ($alternatif_sample2 as $key => $value) {
            foreach ($user as $key2 => $value2) {
                if ($value->user_id == $value2->id) {
                    $value['validasi'] = $value2->validasi;
                    $value['username'] = $value2->username;
                }
            }

            if ($value->validasi == 0 || $value->validasi == null) {
                unset($alternatif_sample2[$i]);
            }
            $i++;
        }

        //repopulasi index array alternatif
        $i = 0;
        foreach ($alternatif_sample2 as $key => $value) {
            $alternatif[$i] = $value;
            $i++;
        }

        //perhitungan pembagi kriteria sekolah
        $pembagi_kriteria_sekolah = [];
        $i = 0;
        foreach ($kriteriaSekolah as $key => $value) {
            $pembagi = 0;
            foreach ($alternatif as $key2 => $value2) {
                if (isset($value2->kriteria_sekolah[$i])) {
                    # code...
                    $pembagi = $pembagi + ($value2->kriteria_sekolah[$i]->bobot * $value2->kriteria_sekolah[$i]->bobot);
                }
            }
            $pembagi_kriteria_sekolah[$i] = sqrt($pembagi);
            $i++;
        }

        //perhitungan pembagi kriteria yayasan
        $pembagi_kriteria_yayasan = [];
        $i = 0;
        foreach ($kriteriaYayasan as $key => $value) {
            $pembagi = 0;
            foreach ($alternatif as $key2 => $value2) {
                if (isset($value2->kriteria_yayasan[$i])) {
                    $pembagi = $pembagi + ($value2->kriteria_yayasan[$i]->bobot * $value2->kriteria_yayasan[$i]->bobot);
                }
            }
            $pembagi_kriteria_yayasan[$i] = sqrt($pembagi);
            $i++;
        }

        //perhitungan matriks ternormalisasi & matriks ternormalisasi terbobot
        $i = 0;

        foreach ($alternatif as $key => $value) {

            //sekolah
            $j = 0;
            foreach ($value->kriteria_sekolah as $key2 => $value2) {

                // matriks ternormalisasi
                $normalisasi_sekolah[$j] = [
                    'kriteria_id' => $value2->kriteria_id,
                    'bobot' => $value2->bobot,
                    'bobot_tn' => $value2->bobot / $pembagi_kriteria_sekolah[$j],
                ];

                // matriks ternormalisasi terbobot
                $normalisasi_terbobot_sekolah[$j] = [
                    'kriteria_id' => $value2->kriteria_id,
                    'bobot' => $value2->bobot,
                    'bobot_tn_tb' => ($normalisasi_sekolah[$j]['bobot_tn']) * $kriteriaSekolah[$j]->bobot,
                ];
                $j++;
            }

            //yayasan
            $j = 0;
            foreach ($value->kriteria_yayasan as $key2 => $value2) {
                // matriks ternormalisasi
                $normalisasi_yayasan[$j] = [
                    'kriteria_id' => $value2->kriteria_id,
                    'bobot' => $value2->bobot,
                    'bobot_tn' => $value2->bobot / $pembagi_kriteria_yayasan[$j],
                ];

                // matriks ternormalisasi terbobot
                $normalisasi_terbobot_yayasan[$j] = [
                    'kriteria_id' => $value2->kriteria_id,
                    'bobot' => $value2->bobot,
                    'bobot_tn_tb' => ($normalisasi_yayasan[$j]['bobot_tn']) * $kriteriaYayasan[$j]->bobot,
                ];
                $j++;
            }

            $value['perhitungan'] = [
                'sekolah' => [
                    'matriks_ternormalisasi' => $normalisasi_sekolah,
                    'matriks_ternormalisasi_terbobot' => $normalisasi_terbobot_sekolah,
                ],
                'yayasan' => [
                    'matriks_ternormalisasi' => $normalisasi_yayasan,
                    'matriks_ternormalisasi_terbobot' => $normalisasi_terbobot_yayasan,
                ],

            ];

            $i++;
        }

        //menentukan sampel solusi ideal positif sekolah
        $sampel_solusi_ideal_K_sekolah = [];
        foreach ($kriteriaSekolah as $key => $value) {
            foreach ($alternatif as $key2 => $value2) {
                $sampel_solusi_ideal_K_sekolah[$key]['kriteria'] = $value->nama;
                $sampel_solusi_ideal_K_sekolah[$key]['kriteria_id'] = $value->id;
                $sampel_solusi_ideal_K_sekolah[$key]['role'] = $value->role;
                $sampel_solusi_ideal_K_sekolah[$key]['alternatif'][$key2] = $value2['perhitungan']['sekolah']['matriks_ternormalisasi_terbobot'][$key]['bobot_tn_tb'];
            }
        }

        //menentukan sampel solusi ideal positif yayasan
        $sampel_solusi_ideal_K_yayasan = [];
        foreach ($kriteriaYayasan as $key => $value) {
            foreach ($alternatif as $key2 => $value2) {
                $sampel_solusi_ideal_K_yayasan[$key]['kriteria'] = $value->nama;
                $sampel_solusi_ideal_K_yayasan[$key]['kriteria_id'] = $value->id;
                $sampel_solusi_ideal_K_yayasan[$key]['role'] = $value->role;
                $sampel_solusi_ideal_K_yayasan[$key]['alternatif'][$key2] = $value2['perhitungan']['yayasan']['matriks_ternormalisasi_terbobot'][$key]['bobot_tn_tb'];
            }
        }

        //menentukan solusi ideal positif dan negatif sekolah
        $solusi_ideal_positif_sekolah = [];
        $solusi_ideal_negatif_sekolah = [];
        $i = 0;
        foreach ($kriteriaSekolah as $key => $value) {
            if ($sampel_solusi_ideal_K_sekolah[$key]['role'] == 'benefit') {
                $solusi_ideal_positif_sekolah[$key] = max($sampel_solusi_ideal_K_sekolah[$key]['alternatif']);
                $solusi_ideal_negatif_sekolah[$key] = min($sampel_solusi_ideal_K_sekolah[$key]['alternatif']);
            } else {
                $solusi_ideal_positif_sekolah[$key] = min($sampel_solusi_ideal_K_sekolah[$key]['alternatif']);
                $solusi_ideal_negatif_sekolah[$key] = max($sampel_solusi_ideal_K_sekolah[$key]['alternatif']);
            }
            $i++;
        }

        //menentukan solusi ideal positif dan negatif yayasan
        $solusi_ideal_positif_yayasan = [];
        $solusi_ideal_negatif_yayasan = [];
        $i = 0;
        foreach ($kriteriaYayasan as $key => $value) {
            if ($sampel_solusi_ideal_K_yayasan[$key]['role'] == 'benefit') {
                $solusi_ideal_positif_yayasan[$key] = max($sampel_solusi_ideal_K_yayasan[$key]['alternatif']);
                $solusi_ideal_negatif_yayasan[$key] = min($sampel_solusi_ideal_K_yayasan[$key]['alternatif']);
            } else {
                $solusi_ideal_positif_yayasan[$key] = min($sampel_solusi_ideal_K_yayasan[$key]['alternatif']);
                $solusi_ideal_negatif_yayasan[$key] = min($sampel_solusi_ideal_K_yayasan[$key]['alternatif']);
            }
            $i++;
        }

        // menentukan D+ & D- sekolah
        $d_p_sekolah = [];
        $d_n_sekolah = [];

        $d_p_yayasan = [];
        $d_n_yayasan = [];

        $i = 0;
        foreach ($alternatif as $key => $value) {

            $j = 0;
            $sampel_d_p_sekolah = 0;
            $sampel_d_n_sekolah = 0;
            foreach ($value->kriteria_sekolah as $key2 => $value2) {

                $sampel_d_p_sekolah = $sampel_d_p_sekolah + (($solusi_ideal_positif_sekolah[$key2] - $alternatif[$i]->perhitungan['sekolah']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb']) * ($solusi_ideal_positif_sekolah[$key2] - $alternatif[$i]->perhitungan['sekolah']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb']));

                $sampel_d_n_sekolah = $sampel_d_n_sekolah + (($alternatif[$i]->perhitungan['sekolah']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb'] - $solusi_ideal_negatif_sekolah[$key2]) * ($alternatif[$i]->perhitungan['sekolah']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb'] - $solusi_ideal_negatif_sekolah[$key2]));

                $j++;
            }

            // menentukan D+ & D- yayasan
            $j = 0;
            $sampel_d_p_yayasan = 0;
            $sampel_d_n_yayasan = 0;
            foreach ($value->kriteria_yayasan as $key2 => $value2) {

                $sampel_d_p_yayasan = $sampel_d_p_yayasan + (($solusi_ideal_positif_yayasan[$key2] - $alternatif[$i]->perhitungan['yayasan']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb']) * ($solusi_ideal_positif_yayasan[$key2] - $alternatif[$i]->perhitungan['yayasan']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb']));

                $sampel_d_n_yayasan = $sampel_d_n_yayasan + (($alternatif[$i]->perhitungan['yayasan']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb'] - $solusi_ideal_negatif_yayasan[$key2]) * ($alternatif[$i]->perhitungan['yayasan']['matriks_ternormalisasi_terbobot'][$j]['bobot_tn_tb'] - $solusi_ideal_negatif_yayasan[$key2]));

                $j++;
            }
            $d_p_sekolah[$i] = sqrt($sampel_d_p_sekolah);
            $d_n_sekolah[$i] = sqrt($sampel_d_n_sekolah);

            $d_p_yayasan[$i] = sqrt($sampel_d_p_yayasan);
            $d_n_yayasan[$i] = sqrt($sampel_d_n_yayasan);

            $i++;
        }

        //menentukan nilai preferensi
        $n_preferensi_sekolah = [];
        $n_preferensi_yayasan = [];
        $i = 0;
        // dd($alternatif);
        // print_r($d_n_sekolah);
        // echo '<br>';
        // print_r($d_p_sekolah);
        // die;

        foreach ($alternatif as $key => $value) {
            $n_preferensi_sekolah[$i] = $d_n_sekolah[$i] / ($d_n_sekolah[$i] + $d_p_sekolah[$i]);
            $n_preferensi_yayasan[$i] = $d_n_yayasan[$i] / ($d_n_yayasan[$i] + $d_p_yayasan[$i]);
            $i++;
        }

        // menentukan ranking nilai preferensi
        $n_preferensi_ranking_sekolah = $n_preferensi_sekolah;
        rsort($n_preferensi_ranking_sekolah);

        $n_preferensi_ranking_yayasan = $n_preferensi_yayasan;
        rsort($n_preferensi_ranking_yayasan);

        //menentukan ranking dan bobot ranking borda
        $ranking = [];
        $bobot_ranking = [];
        foreach ($alternatif as $key => $value) {
            $ranking[$key] = $key + 1;
            $bobot_ranking[$key] = count($alternatif) - $key;
        }

        //menentukan ranking nilai preferensi sekolah
        foreach ($n_preferensi_sekolah as $key => $value) {
            foreach ($n_preferensi_ranking_sekolah as $key2 => $value2) {
                if ($value == $value2) {
                    $n_preferensi_sekolah[$key] = [
                        'nilai_preferensi' => $value,
                        'ranking' => $key2 + 1,
                    ];
                }
            }
        }

        //menentukan ranking nilai preferensi yayasan
        foreach ($n_preferensi_yayasan as $key => $value) {
            foreach ($n_preferensi_ranking_yayasan as $key2 => $value2) {
                if ($value == $value2) {
                    $n_preferensi_yayasan[$key] = [
                        'nilai_preferensi' => $value,
                        'ranking' => $key2 + 1,
                    ];
                }
            }
        }

        // perhitungan borda

        //menentukan poin borda
        $poin_borda = [];
        $total_poin_borda = 0;
        foreach ($alternatif as $key => $value) {
            $poin_borda[$key] = ($n_preferensi_sekolah[$key]['nilai_preferensi'] * $bobot_ranking[$n_preferensi_sekolah[$key]['ranking'] - 1]) + ($n_preferensi_yayasan[$key]['nilai_preferensi'] * $bobot_ranking[$n_preferensi_yayasan[$key]['ranking'] - 1]);

            // echo ('(' . $n_preferensi_sekolah[$key]['nilai_preferensi'] . ' * ' . $bobot_ranking[$n_preferensi_sekolah[$key]['ranking'] - 1] . ') + (' . $n_preferensi_yayasan[$key]['nilai_preferensi'] . ' * ' . $bobot_ranking[$n_preferensi_yayasan[$key]['ranking'] - 1] . ') = ' . ($n_preferensi_sekolah[$key]['nilai_preferensi'] * $bobot_ranking[$n_preferensi_sekolah[$key]['ranking'] - 1]) + ($n_preferensi_yayasan[$key]['nilai_preferensi'] * $bobot_ranking[$n_preferensi_yayasan[$key]['ranking'] - 1]));
            // echo '<br>';

            $total_poin_borda = $total_poin_borda + $poin_borda[$key];
        }
        // dd($n_preferensi_sekolah);
        //menentukan nilai borda
        $nilai_borda = [];
        $i = 0;
        foreach ($poin_borda as $key => $value) {
            $nilai_borda[$key] = $value / $total_poin_borda;
            $i++;
        }
        // dd($nilai_borda);
        //menentukan ranking borda
        $nilai_ranking_borda = $nilai_borda;
        rsort($nilai_ranking_borda);

        foreach ($nilai_borda as $key => $value) {
            foreach ($nilai_ranking_borda as $key2 => $value2) {
                if ($value == $value2) {
                    $nilai_borda[$key] = [
                        'nilai_borda' => $value,
                        'ranking' => $key2 + 1,
                    ];
                }
            }
        }

        // dd($nilai_borda);

        $return_sample = [];
        foreach ($alternatif as $key => $value) {
            $return_sample[$key] = [
                'ranking' => $nilai_borda[$key]['ranking'],
                'id' => $value->id,
                'user_id' => $value->user_id,
                'username' => $value->username,
                'nama' => $value->nama,
                'validasi' => $value->validasi,
                'topsis' => [
                    'sekolah' => [
                        'matriks_ternormalisasi' => $value->perhitungan['sekolah']['matriks_ternormalisasi'],
                        'matriks_ternormalisasi_terbobot' => $value->perhitungan['sekolah']['matriks_ternormalisasi_terbobot'],
                        'D+' => $d_p_sekolah[$key],
                        'D-' => $d_n_sekolah[$key],
                        'nilai_preferensi' => $n_preferensi_sekolah[$key],
                    ],
                    'yayasan' => [
                        'matriks_ternormalisasi' => $value->perhitungan['yayasan']['matriks_ternormalisasi'],
                        'matriks_ternormalisasi_terbobot' => $value->perhitungan['yayasan']['matriks_ternormalisasi_terbobot'],
                        'D+' => $d_p_yayasan[$key],
                        'D-' => $d_n_yayasan[$key],
                        'nilai_preferensi' => $n_preferensi_yayasan[$key],
                    ],

                ],
                'borda' => [
                    'poin_borda' => $poin_borda[$key],
                    'nilai_borda' => $nilai_borda[$key]['nilai_borda'],
                ],
                'status' => null,
            ];
            $i++;
        }

        sort($return_sample);

        $return = [];
        $temp = Kuota::get();
        $kuota = 0;
        if (isset($temp[0]->kuota)) {
            $kuota = $temp[0]->kuota;
        }
        $i = 1;
        HasilPerhitungan::truncate();
        foreach ($return_sample as $key => $value) {
            if ($i <= $kuota) {
                $status = 'L';
            } else {
                $status = 'TL';
            }

            $return[$key] = [
                'ranking' => $value['ranking'],
                'id' => $value['id'],
                'user_id' => $value['user_id'],
                'username' => $value['username'],
                'nama' => $value['nama'],
                'validasi' => $value['validasi'],
                'topsis' => [
                    'sekolah' => [
                        'matriks_ternormalisasi' => $value['topsis']['sekolah']['matriks_ternormalisasi'],
                        'matriks_ternormalisasi_terbobot' => $value['topsis']['sekolah']['matriks_ternormalisasi_terbobot'],
                        'D+' => $value['topsis']['sekolah']['D+'],
                        'D-' => $value['topsis']['sekolah']['D-'],
                        'nilai_preferensi' => $value['topsis']['sekolah']['nilai_preferensi'],
                    ],
                    'yayasan' => [
                        'matriks_ternormalisasi' => $value['topsis']['yayasan']['matriks_ternormalisasi'],
                        'matriks_ternormalisasi_terbobot' => $value['topsis']['yayasan']['matriks_ternormalisasi_terbobot'],
                        'D+' => $value['topsis']['yayasan']['D+'],
                        'D-' => $value['topsis']['yayasan']['D-'],
                        'nilai_preferensi' => $value['topsis']['yayasan']['nilai_preferensi'],
                    ],

                ],
                'borda' => [
                    'poin_borda' => $value['borda']['poin_borda'],
                    'nilai_borda' => $value['borda']['nilai_borda'],
                ],
                'status' => $status,
            ];
            $create = [
                'akun' => $value['username'],
                'nama' => $value['nama'],
                'nilai_borda' => $value['borda']['nilai_borda'],
                'ranking' => $value['ranking'],
                'status' => $status,
            ];
            HasilPerhitungan::create($create);
            $i++;
        }

        return $return;
    }

    public function result(Type $var = null)
    {
        $kuota = Kuota::get();
        $alternatif = Biodata::with('kriteria_sekolah', 'kriteria_sekolah')->get();
        $kriteriaSekolah = KriteriaSekolah::get();
        $kriteriaYayasan = KriteriaYayasan::get();
        $perhitungan = $this->topsis();

        // dd($perhitungan);

        return view('perhitungan.hasil', ['alternatif' => $alternatif, 'kriteriaSekolah' => $kriteriaSekolah, 'kriteriaYayasan' => $kriteriaYayasan, 'perhitungan' => $perhitungan, 'kuota' => $kuota]);
    }

    public function broadcast(Request $request)
    {
        // $hasil = HasilPerhitungan::get();
        // $array = [];
        // $array = $request->all();
        // if ($array['kuota'] > count($hasil)) {
        //     Session::flash('errMessage', 'Kuota tidak boleh melebihi jumlah member!');
        //     return redirect('/perhitungan-result');
        // }

        $rules['kuota'] = 'required|max:100|gte:1';
        $messages['kuota.required'] = 'Kuota wajib diisi!';
        $messages['kuota.max'] = 'Karakter kuota tidak boleh lebih dari :max!';
        $messages['kuota.gte'] = 'Kuota harus lebih dari 0!';

        $request->validate($rules, $messages);

        Kuota::truncate();
        $result = Kuota::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Hasil Perhitungan berhasil di Broadcast!');
        } else {
            Session::flash('errMessage', 'Hasil Perhitungan gagal di Broadcast!!');
        }

        return redirect('/perhitungan-result');
    }
}