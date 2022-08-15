<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Sepeda;

class Run extends Controller
{
    public function index() {
        $sepeda = new Sepeda ();

        echo $sepeda->warna = "Merah";
        echo "<br/>";
        echo $sepeda->merk = "Kijang";
        echo "<br/>";
        echo $sepeda->mesin = 12345;
        echo "<br/>";

        echo $sepeda->hidupkan_mobil();
        echo "<br/>";
        echo $sepeda->lihat_ciri();
        echo "<br/>";

        // return view('jadkul.create');
    }
}
