<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Mobil;

class Sepeda extends Mobil
{
        public function lihat_ciri() {
            return "Warna : $this->warna, Merk : $this->merk, Mesin : $this->mesin";
        
        }
    }
    

