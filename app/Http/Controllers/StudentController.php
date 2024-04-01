<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $students = Student::with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nis', 'LIKE', '%' . $keyword . '%')->orWhereHas('class', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        })
            ->paginate(15);

        return view('student', ['students' => $students]);
    }

    public function show($id)
    {
        $student = Student::with(['class.teachers', 'extracurriculars'])->findOrFail($id);
        return view('detail.student-detail', ['student' => $student]);
    }

    public function create()
    {
        $classes = Classroom::all();
        return view('add.student-add', ['classes' => $classes]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'unique:students|max:50|required',
            'nis' => 'unique:students|max:6|min:6|required',
            'gender' => 'required',
            'class_id' => 'required',
        ];

        $messages = [
            'name.unique' => 'Nama sudah ada',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'name.required' => 'Nama wajib diisi',
            'nis.unique' => 'NIS sudah ada',
            'nis.max' => 'NIS tidak boleh lebih dari :max karakter',
            'nis.min' => 'NIS tidak boleh kurang dari :min karakter',
            'nis.required' => 'NIS wajib diisi',
            'gender.required' => 'Gender wajib diisi',
            'class.required' => 'Class wajib diisi',
        ];

        $request->validate($rules, $messages);

        $newName = null;

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photos', $newName);
        }

        $request['image'] = $newName;
        // dd($request->all());
        $student = Student::create($request->all());

        if ($student) {
            Session::flash('succMessage', 'Add Student Success!');
        } else {
            Session::flash('errMessage', 'Add Student Failed!');
        }

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::with('class')->findOrFail($id);
        $classes = Classroom::all();
        return view('edit.student-edit', ['student' => $student, 'classes' => $classes]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $rules = [
            'gender' => 'required',
            'class_id' => 'required',
        ];

        $messages = [];

        if ($request->name != $student->name) {
            $rules['name'] = 'unique:students|max:50|required';
            $messages['name.unique'] = 'Nama Sudah ada';
            $messages['name.max'] = 'Nama tidak boleh lebih dari :max karakter';
        } else if ($request->nis != $student->nis) {
            $rules['nis'] = 'unique:students|max:6|min:6||required';
            $messages['nis.unique'] = 'NIS Sudah ada';
            $messages['nis.max'] = 'NIS tidak boleh lebih dari :max karakter';
            $messages['nis.min'] = 'NIS tidak boleh kurang dari :min karakter';
            $messages['gender.required'] = 'Gender tidak boleh kurang dari :min karakter';
            $messages['class_id.required'] = 'Class tidak boleh kurang dari :min karakter';
        }

        $request->validate($rules, $messages);

        $studentUp = $student->update($request->all());

        if ($studentUp) {
            Session::flash('succMessage', 'Update Student Success!');
        } else {
            Session::flash('errMessage', 'Update Student Failed!');
        }

        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('delete.student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student = $student->delete();

        if ($student) {
            Session::flash('succMessage', 'Delete Student Success!');
        } else {
            Session::flash('errMessage', 'Delete Student Failed!');
        }

        return redirect('/students');
    }

    // public function validator($student)
    // {
    //     $validatedData = $student->validate([
    //         'name' => 'unique:students|max:50',
    //         'nis' => 'unique:students|max:6|min:6',
    //     ]);

    //     return $validatedData;
    // }
}