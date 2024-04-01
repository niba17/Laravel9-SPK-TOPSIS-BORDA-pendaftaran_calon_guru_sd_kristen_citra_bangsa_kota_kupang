<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AlternatifKriteriaSekolah;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaSekolah extends Model
{
    use HasFactory;
    protected $table = 'kriteria_sekolah';
    protected $guarded = ['id'];

    public function alternatif_kriteria_sekolah()
    {
        return $this->hasMany(AlternatifKriteriaSekolah::class, 'kriteria_id', 'id');
    }
}