<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use PHPUnit\Util\Type;

class ClassroomController extends Controller
{
    public function index(Type $var = null)
    {
        $class = Classroom::get();

        return view('classroom', ['classes' => $class]);
    }

    public function show($id)
    {
        $classroom = Classroom::with(['students', 'teachers'])->findOrFail($id);
        return view('detail.classroom-detail', ['classroom' => $classroom]);
    }

}
