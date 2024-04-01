<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getAjax()
    {
        $id = $_GET['id'];

        return $id;
    }
}