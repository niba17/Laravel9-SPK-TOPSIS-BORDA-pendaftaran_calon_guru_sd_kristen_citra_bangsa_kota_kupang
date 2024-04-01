<?php

namespace App\Http\Controllers;

use App\Models\HasilAdministrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class MemberController extends Controller
{
    public function index(Type $var = null)
    {
        $members = User::with('biodata')->get();

        return view('member', ['members' => $members]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $result = $user->update($request->all());

        return $result;
    }

    public function broadcast(Type $var = null)
    {
        HasilAdministrasi::truncate();
        $members = User::with('biodata')->get();
        $i = 0;
        foreach ($members as $key => $value) {
            if ($value->role == 1) {
                $array[$i] = [
                    'akun' => $value->username,
                    'nama' => $value->biodata->nama ?? $value->username,
                    'validasi' => $value->validasi ?? 0,
                ];
            }
            $i++;
        }

        $l = [];
        $tl = [];
        $i = 0;
        $j = 0;
        foreach ($array as $key => $value) {
            if ($value['validasi'] == 1) {
                $l[$i] = $value;
                $i++;
            } else {
                $tl[$j] = $value;
                $j++;
            }
        }

        $array = array_merge($l, $tl);

        $i = 0;
        foreach ($array as $key => $value) {
            # code...
            $result[$i] = HasilAdministrasi::create($value);
            $i++;
        }

        $success = true;
        foreach ($result as $key => $value) {
            if (!$value) {
                $success = false;
            }
        }

        if ($success == true) {
            Session::flash('succMessage', 'Hasil Administrasi berhasil di Broadcast!');
        } else {
            Session::flash('errMessage', 'Hasil Administrasi gagal di Broadcast!');
        }

        return redirect('/member');
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member = $member->delete();

        if ($member) {
            Session::flash('succMessage', 'Member berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Member berhasil dihapus!');
        }

        return redirect('/member');
    }

    public function request()
    {
        $users = User::get();
        return response()->json($users);
    }
}