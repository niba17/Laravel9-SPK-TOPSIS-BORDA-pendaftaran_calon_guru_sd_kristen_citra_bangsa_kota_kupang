<?php

namespace App\Models;

use App\Models\Biodata;
use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $guarded = ['id'];
}