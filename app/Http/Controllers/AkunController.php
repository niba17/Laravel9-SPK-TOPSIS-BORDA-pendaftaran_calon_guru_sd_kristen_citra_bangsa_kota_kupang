<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    public function create(Type $var = null)
    {
        return view('add.akun-add');
    }

    public function store(Request $request)
    {
        // dd($request->username);
        $rules = [];
        $messages = [];
        $rules['username'] = 'unique:users|max:50|required';
        $rules['password'] = 'required';
        $rules['passwordConfirm'] = 'same:password|required';
        $messages['username.unique'] = 'Username sudah ada!';
        $messages['username.max'] = 'Username tidak boleh lebih dari :max karakter!';
        $messages['username.required'] = 'Username wajib diisi!';
        $messages['password.required'] = 'Password wajib diisi!';
        $messages['passwordConfirm.required'] = 'Konfirmasi Password wajib diisi!';
        $messages['passwordConfirm.same'] = 'Konfirmasi Password tidak sesuai!';

        $request->validate($rules, $messages);

        $request->merge([
            'password' => bcrypt($request->password)
        ]);

        $store = User::create($request->all());

        if ($store) {
            Session::flash('succMessage', 'Akun berhasil dibuat!');
        } else {
            Session::flash('errMessage', 'Akun gagal dibuat!');
        }

        return redirect('/akun-add');
    }
}