<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadkul extends Model
{
    use HasFactory;

    public $fillable = [
        'kode_pengampu', 'kode_jam', 'kode_hari', 'kode_ruang' 
    ];

    // public function pengampu()
    // {
    //     return $this->hasOne('App\Models\Pengampu', 'id');
    // }

    public function jam()
    {
        return $this->belongsTo(Jam::class, 'kode_jam');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'kode_hari');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'kode_ruang');
    }

    public function pengampu()
    {
        return $this->belongsTo(Pengampu::class, 'kode_pengampu');
    }
}
