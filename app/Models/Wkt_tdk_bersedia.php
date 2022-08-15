<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wkt_tdk_bersedia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_dosen','kode_hari','kode_jam'
    ];
}
