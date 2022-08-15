<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\http\Controllers\MatakuliahController;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = [
         'kode_mk','nama', 'sks', 'semester', 'aktif', 'jenis'
     ];

     public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'kode_mk');
    }
}
