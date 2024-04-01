<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use PHPUnit\Util\Type;

class TeacherController extends Controller
{
    public function index(Type $var = null)
    {
        $teacher = Teacher::get();

        return view('teacher', ['teachers' => $teacher]);
    }

    public function show($id)
    {
        $teacher = Teacher::with(['classes.students'])->findOrFail($id);
        return view('detail.teacher-detail', ['teacher' => $teacher]);
    }

}
