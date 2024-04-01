<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use PHPUnit\Util\Type;

class ExtracurricularController extends Controller
{
    public function index(Type $var = null)
    {
        $extracurricular = Extracurricular::get();
        return view('extracurricular', ['extracurriculars' => $extracurricular]);
    }

    public function show($id)
    {
        $extracurricular = Extracurricular::with(['students'])->findOrFail($id);
        return view('detail.extracurricular-detail', ['extracurricular' => $extracurricular]);
    }
}
