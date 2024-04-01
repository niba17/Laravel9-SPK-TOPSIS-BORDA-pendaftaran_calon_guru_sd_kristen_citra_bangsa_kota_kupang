<?php

namespace App\Models;

use App\Models\AlternatifKriteria;
use Illuminate\Database\Eloquent\Model;
use App\Models\AlternatifKriteriaSekolah;
use App\Models\AlternatifKriteriaYayasan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biodata extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $guarded = ['id'];

    static function cari($column, $key)
    {
        $query = Biodata::get();

        foreach ($query->all() as $item => $value) {
            foreach ($value->original as $item2 => $value2) {
                if ($item2 == $column) {
                    if ($key == $value2) {
                        return $value;
                    }
                }
            }
        }
    }

    public function kriteria_sekolah()
    {
        return $this->hasMany(AlternatifKriteriaSekolah::class, 'biodata_id', 'id');
    }

    public function kriteria_yayasan()
    {
        return $this->hasMany(AlternatifKriteriaYayasan::class, 'biodata_id', 'id');
    }
}