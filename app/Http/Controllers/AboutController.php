<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Type $var = null)
    {
        return view('about');
    }
}
