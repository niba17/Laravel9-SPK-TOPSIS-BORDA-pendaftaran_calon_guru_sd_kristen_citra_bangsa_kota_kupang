<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Type $var = null)
    {
        $members = User::get();

        return view('members', ['members' => $members]);
    }
}