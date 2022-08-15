<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    
    public $fillable = [
        'nama','kapasitas','jenis'
    ];    

    public function jadkul()
    {
        return $this->hasMany(Jadkul::class, 'kode_ruang');
    }
}
