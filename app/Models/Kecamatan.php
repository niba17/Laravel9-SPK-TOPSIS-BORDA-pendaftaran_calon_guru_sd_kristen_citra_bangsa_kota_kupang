<?php

namespace App\Models;

use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $guarded = ['id'];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function puskesmas()
    {
        return $this->hasMany(Puskesmas::class, 'kecamatan_id', 'id');
    }
}