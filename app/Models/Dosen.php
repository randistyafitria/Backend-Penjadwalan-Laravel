<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nidn', 'nama', 'alamat', 'telp'
    ];

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'kode_dosen');
    }

    public function jadkul()
    {
        return $this->hasManyThrough(Jadkul::class, Pengampu::class, 'kode_dosen', 'kode_pengampu');
    }
}
