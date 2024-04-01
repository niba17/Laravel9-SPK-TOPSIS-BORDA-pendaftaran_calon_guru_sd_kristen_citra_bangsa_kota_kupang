<?php

namespace App\Models;

use App\Models\KriteriaSekolah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlternatifKriteriaSekolah extends Model
{
    use HasFactory;
    protected $table = 'alternatif_kriteria_sekolah';
    protected $guarded = ['id'];

    public function k_s()
    {
        return $this->belongsTo(KriteriaSekolah::class, 'kriteria_id', 'id');
    }
}