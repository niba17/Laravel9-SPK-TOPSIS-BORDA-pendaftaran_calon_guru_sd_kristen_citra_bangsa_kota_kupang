<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function classes()
    {
        return $this->hasOne(Classroom::class, 'teacher_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'teacher_id', 'id');
    }
}
