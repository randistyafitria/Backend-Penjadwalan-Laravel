<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Test extends Controller
{
    public function index ()
    {
            $students = DB::table('ruangs')->select('nama', 'kapasitas', 'jenis')->get();
            $table="<table border='1' width='300'";
            $table.="<tr><th>Nama</th><th>Kapasitas</th><th>Jenis</th></tr>";

            foreach($students as $student){
            $table.="<tr><td>$student->nama</td><td>$student->kapasitas</td><td>$student->jenis</td></tr>";
            }
            $table.="</table>";
            echo $table;
    }
    
}
