<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DataDiriController extends Controller
{
    public function index(Type $var = null)
    {
        // $user = User::findOrFail(Auth::user()->id);
        // $biodata = Biodata::cari('user_id', Auth::user()->id);
        $user =  User::with('biodata')->findOrFail(Auth::user()->id);
        // dd($biodata);
        return view('dataDiri', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::with('biodata')->findOrFail($id);

        // dd($user);

        return view('edit.dataDiri-edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $rules = [];
        $messages = [];
        $array = [];
        // dd($array);
        $user = User::with('biodata')->findOrFail($id);
        // dd($user);
        if (isset($user->biodata)) {
            # code...
            $biodata = Biodata::findOrFail($user->biodata->id);
        }

        if (isset($user->biodata->nama) && $request->nama != $user->biodata->nama) {
            $rules['nama'] = 'unique:biodata|max:50';
            $messages['nama.unique'] = 'Nama Sudah ada!';
            $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        }

        if (isset($user->biodata->no_hp) && $request->no_hp != $user->biodata->no_hp) {
            $rules['no_hp'] = 'unique:biodata|max:50|';
            $messages['no_hp.unique'] = 'Nomer HP Sudah ada!';
            $messages['no_hp.max'] = 'Nomer HP tidak boleh lebih dari :max karakter!';
        }

        $array = $request->all();

        if ($request->scan_foto != null && isset($user->biodata->scan_foto) && $request->scan_foto != $user->biodata->scan_foto) {
            $rules['scan_foto'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_foto.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_foto.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_foto.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_foto.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_foto')->getClientOriginalExtension();
            $newName = $user->username . '_sfoto_' . now()->timestamp . '.' . $extension;
            $request->file('scan_foto')->storeAs('images', $newName);


            $array['scan_foto'] = $newName;
        } else if ($request->scan_foto != null) {
            $rules['scan_foto'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_foto.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_foto.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_foto.max'] = 'File tidak boleh lebih dari :max kb!';

            $newName = '';
            $extension = $request->file('scan_foto')->getClientOriginalExtension();
            $newName = $user->username . '_sfoto_' . now()->timestamp . '.' . $extension;
            $request->file('scan_foto')->storeAs('images', $newName);


            $array['scan_foto'] = $newName;

            // dd($array['scan_foto']);
        }
        if ($request->scan_ktp != null && isset($user->biodata->scan_ktp) && $request->scan_ktp != $user->biodata->scan_ktp) {
            $rules['scan_ktp'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_ktp.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_ktp.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_ktp.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_ktp.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_ktp')->getClientOriginalExtension();
            $newName = $user->username . '_sktp_' . now()->timestamp . '.' . $extension;
            $request->file('scan_ktp')->storeAs('images', $newName);


            $array['scan_ktp'] = $newName;
        } else if ($request->scan_ktp != null) {
            $rules['scan_ktp'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_ktp.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_ktp.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_ktp.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_ktp.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_ktp')->getClientOriginalExtension();
            $newName = $user->username . '_sktp_' . now()->timestamp . '.' . $extension;
            $request->file('scan_ktp')->storeAs('images', $newName);


            $array['scan_ktp'] = $newName;
        }
        if ($request->scan_ijazah != null && isset($user->biodata->scan_ijazah) && $request->scan_ijazah != $user->biodata->scan_ijazah) {
            $rules['scan_ijazah'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_ijazah.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_ijazah.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_ijazah.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_ijazah.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_ijazah')->getClientOriginalExtension();
            $newName = $user->username . '_sijazah_' . now()->timestamp . '.' . $extension;
            $request->file('scan_ijazah')->storeAs('images', $newName);


            $array['scan_ijazah'] = $newName;
        } else if ($request->scan_ijazah != null) {
            $rules['scan_ijazah'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_ijazah.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_ijazah.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_ijazah.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_ijazah.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_ijazah')->getClientOriginalExtension();
            $newName = $user->username . '_sijazah_' . now()->timestamp . '.' . $extension;
            $request->file('scan_ijazah')->storeAs('images', $newName);


            $array['scan_ijazah'] = $newName;
        }
        if ($request->scan_kk != null && isset($user->biodata->scan_kk) && $request->scan_kk != $user->biodata->scan_kk) {
            $rules['scan_kk'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_kk.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_kk.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_kk.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_kk.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_kk')->getClientOriginalExtension();
            $newName = $user->username . '_skk_' . now()->timestamp . '.' . $extension;
            $request->file('scan_kk')->storeAs('images', $newName);


            $array['scan_kk'] = $newName;
        } else if ($request->scan_kk != null) {
            $rules['scan_kk'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_kk.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_kk.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_kk.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_kk.required'] = 'Kolom harus diisi!';


            $newName = '';
            $extension = $request->file('scan_kk')->getClientOriginalExtension();
            $newName = $user->username . '_skk_' . now()->timestamp . '.' . $extension;
            $request->file('scan_kk')->storeAs('images', $newName);


            $array['scan_kk'] = $newName;
        }
        if ($request->scan_slk != null && isset($user->biodata->scan_slk) && $request->scan_slk != $user->biodata->scan_slk) {
            $rules['scan_slk'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_slk.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_slk.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_slk.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_slk.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_slk')->getClientOriginalExtension();
            $newName = $user->username . '_sslk_' . now()->timestamp . '.' . $extension;
            $request->file('scan_slk')->storeAs('images', $newName);


            $array['scan_slk'] = $newName;
        } else if ($request->scan_slk != null) {
            $rules['scan_slk'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_slk.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_slk.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_slk.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_slk.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_slk')->getClientOriginalExtension();
            $newName = $user->username . '_sslk_' . now()->timestamp . '.' . $extension;
            $request->file('scan_slk')->storeAs('images', $newName);


            $array['scan_slk'] = $newName;
        }
        if ($request->scan_ak != null && isset($user->biodata->scan_ak) && $request->scan_ak != $user->biodata->scan_ak) {
            $rules['scan_ak'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_ak.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_ak.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_ak.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_ak.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_ak')->getClientOriginalExtension();
            $newName = $user->username . '_sak_' . now()->timestamp . '.' . $extension;
            $request->file('scan_ak')->storeAs('images', $newName);


            $array['scan_ak'] = $newName;
        } else if ($request->scan_ak != null) {
            $rules['scan_ak'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_ak.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_ak.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_ak.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_ak.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_ak')->getClientOriginalExtension();
            $newName = $user->username . '_sak_' . now()->timestamp . '.' . $extension;
            $request->file('scan_ak')->storeAs('images', $newName);


            $array['scan_ak'] = $newName;
        } else if ($request->scan_cv != null) {
            $rules['scan_cv'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['scan_cv.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg, pdf';
            $messages['scan_cv.image'] = 'Format file tidak sesuai, format yang diijinkan : jpgkb jpeg, pdf';
            $messages['scan_cv.max'] = 'File tidak boleh lebih dari :max kb!';
            $messages['scan_cv.required'] = 'Kolom harus diisi!';

            $newName = '';
            $extension = $request->file('scan_cv')->getClientOriginalExtension();
            $newName = $user->username . '_scv_' . now()->timestamp . '.' . $extension;
            $request->file('scan_cv')->storeAs('images', $newName);


            $array['scan_cv'] = $newName;
        }

        // dd($array);
        // die;

        //note : validasi jika file yg dikirim berbeda

        // dd($rules);
        $request->validate($rules, $messages);

        $biodataUp = '';
        $biodataAdd = '';
        if (isset($biodata)) {
            # code...
            $biodataUp = $biodata->update($array);
        } else {

            $biodataAdd = Biodata::create($array);
        }


        if ($biodataUp || $biodataAdd) {
            Session::flash('succMessage', 'Biodata berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Biodata gagal diubah!');
        }

        return redirect('/dataDiri');
    }
}