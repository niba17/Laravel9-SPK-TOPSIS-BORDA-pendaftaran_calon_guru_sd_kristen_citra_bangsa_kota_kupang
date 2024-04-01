<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotYayasan extends Model
{
    use HasFactory;
    protected $table = 'bobot_yayasan';
    protected $guarded = ['id'];
}