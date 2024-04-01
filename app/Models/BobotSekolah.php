<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotSekolah extends Model
{
    use HasFactory;
    protected $table = 'bobot_sekolah';
    protected $guarded = ['id'];
}