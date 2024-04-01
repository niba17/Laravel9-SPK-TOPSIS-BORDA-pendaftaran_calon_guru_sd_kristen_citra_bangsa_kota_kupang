<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function class ()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'students_extracurriculars', 'student_id', 'extracurricular_id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    //menegaskan nama tabel
    // protected $table = 'students';

    //menegaskan primary key pada tabel
    // protected $primaryKey = 'id';

    //menegaskan auto increment
    // public $incrementing = false;

    //menegaskan timestamps()
    // public $timestamps = false;
}