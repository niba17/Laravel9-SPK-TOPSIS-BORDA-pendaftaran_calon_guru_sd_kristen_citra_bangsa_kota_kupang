<?php

namespace App\Models;

use App\Models\KriteriaYayasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlternatifKriteriaYayasan extends Model
{
    use HasFactory;
    protected $table = 'alternatif_kriteria_yayasan';
    protected $guarded = ['id'];
}