<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAdministrasi extends Model
{
    use HasFactory;
    protected $table = 'hasil_administrasi';
    protected $guarded = ['id'];
}