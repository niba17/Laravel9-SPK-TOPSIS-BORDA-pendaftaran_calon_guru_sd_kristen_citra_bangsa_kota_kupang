<?php

namespace App\Models;

use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';
    protected $guarded = ['id'];

    // public function kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class);
    // }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }
}