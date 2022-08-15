<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'range_jam', 'aktif'
    ];

    public function jadkul()
    {
        return $this->hasMany(Jadkul::class, 'kode_jam');
    }

}