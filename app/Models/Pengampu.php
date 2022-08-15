<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pengampu extends Model
{
    use HasFactory;
    
        protected $fillable = [
            'kode_mk','kode_dosen','kelas','tahun_akademik'
        ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'kode_mk');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'kode_dosen');
    }

    public function jadkul()
    {
        return $this->hasMany(Jadkul::class, 'kode_pengampu');
    }
    
}
