<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaYayasan extends Model
{
    use HasFactory;
    protected $table = 'kriteria_yayasan';
    protected $guarded = ['id'];
}