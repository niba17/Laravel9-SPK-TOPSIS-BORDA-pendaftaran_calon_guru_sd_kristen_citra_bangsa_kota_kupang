<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_extracurriculars', 'extracurricular_id', 'student_id');
    }
}
