<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Algoritma\GenerateAlgoritma;
use App\Http\Controllers\Controller;
use App\Models\Dosen;  //lecturer
use App\Models\Jadkul;  //jadkul
//use App\Models\Setting;   
use App\Models\Pengampu;     //teach
use Excel;

class GenetikController extends Controller
{
    public function index(Request $request)
    {
        $class = Pengampu::select('kelas')->groupBy('kelas')->pluck('kelas', 'kelas');

        return view('layouts.index', compact('class'));
    }
}
