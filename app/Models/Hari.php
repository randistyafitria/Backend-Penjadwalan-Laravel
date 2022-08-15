<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function jadkul()
    {
        return $this->hasMany(Jadkul::class, 'kode_hari');
    }
}
