<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    //menegaskan nama tabel
    protected $table = 'class';

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
