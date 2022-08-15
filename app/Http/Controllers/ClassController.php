<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen;
use App\Models\Hari;
use App\Models\Jadkul;
use App\Models\Jam;
use App\Models\Matkul;
use App\Models\Pengampu;
use App\Models\Ruang;
use App\Models\Wkt_tdk_bersedia;

class ClassController extends Controller
{
    public function GetKelas($param)
    {   
        // $pengampu = Pengampu::all();
        // dd($pengampu);

        //SELECT pengampus.id, matkuls.sks, pengampus.kode_dosen, matkuls.jenis 
        //FROM `pengampus` LEFT JOIN `matkuls` ON pengampus.kode_mk = matkuls.id 
        //WHERE matkuls.semester "AND" 2 = 0 AND pengampus.tahun_akademik LIKE '%3'

        $pengampus = Pengampu::select(
            'pengampus.id', 
            'matkuls.sks',
            'pengampus.kode_dosen', 
            'matkuls.jenis'
        )
        ->leftJoin('matkuls', 'pengampus.kode_mk', '=', 'matkuls.id')
        ->where([
            ['matkuls.semester',  '2', 0],
            ['pengampus.tahun_akademik', 'LIKE', '%3']  //%s ->interpretasi string
        ])
        ->get();   /////
        
        return $pengampus;

        //dd($pengampus);
    }

    public function GetJam()
    {
        $jams = Jam::select('id')
        ->get();  /////

        return $jams;

        //dd($jams);
    }

    public function GetHari()
    {
        $haris = Hari::select('id')
        ->get();

        return $haris;

        //dd($haris);
    }

    public function GetRuang()
    {
        $ruangs = Ruang::select('id')
        ->where('jenis', 'TEORI')  
        ->get();

        return $ruangs;

        //dd($ruangs);   /////
    }

    public function GetTimeOffDosen()
    {
        $wkt_tdk_bersedias = Wkt_tdk_bersedia::select(
            'kode_dosen',
            (DB::raw("CONCAT_WS(':',kode_hari,kode_jam) AS kode_hari_jam")) //concat_ws -> nambah karakter
        )
        ->get();

        return $wkt_tdk_bersedias;

        // dd($wkt_tdk_bersedias);
    }

    public function KosongkanJadwal()
    {
        $jadkuls = Jadkul::truncate();  
        
        return $jadkuls;

        //dd($jadkuls);
    }


    //INSERT INTO `jadkuls` (`id`, `kode_pengampu`, `kode_jam`, `kode_hari`, 
    //`kode_ruang`, `created_at`, `updated_at`) VALUES ('5', '1', '3', '1', '4', NULL, NULL);
    public function InsertJadwal()
    {
        $jadkuls = Jadkul::insert('insert into jadkuls (kode_pengampu, kode_jam, kode_hari, kode_ruang) 
                                    values (%s, %s, %s, %s)');  // %s -> interpretasi string

        return $jadkuls;
    }


    //SELECT e.nama AS hari, 
    //#CONCAT_WS('-', CONCAT('(', g.id), CONCAT( (SELECT id FROM `jams` WHERE id = (SELECT jm.id FROM `jams` jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1)),')')) AS sesi, 
    //#CONCAT_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM `jams` WHERE id = (SELECT jm.id FROM `jams` jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1))) AS jam_kuliah, 
    //CONCAT('(',g.id, '-', g.id + c.sks - 1,')') AS sesi,
    //CONCAT_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM `jams` WHERE id = g.id + c.sks - 1)) AS jam_kuliah, 
    //c.nama AS nama_mk, 
    //c.sks AS sks, 
    //c.semester AS semester, 
    //b.kelas AS kelas, 
    //d.nama AS dosen, 
    //f.nama AS ruang 
    //FROM `jadkuls` a 
    //LEFT JOIN `pengampus` b ON a.kode_pengampu = b.id 
    //LEFT JOIN `matkuls` c ON b.kode_mk = c.id 
    //LEFT JOIN `dosens` d ON b.kode_dosen = d.id 
    //LEFT JOIN `haris` e ON a.kode_hari = e.id 
    //LEFT JOIN `ruangs` f ON a.kode_ruang = f.id 
    //LEFT JOIN `jams` g ON a.kode_jam = g.id 
    //ORDER BY e.id ASC, Jam_Kuliah ASC
    public function GetJadwal()
    {
        $jadkuls = Jadkul::select(
            'haris.nama as hari',
            DB::raw("CONCAT('(',jams.id, '-', jams.id + matkuls.sks - 1,')') AS sesi"),
            DB::raw("CONCAT_WS('-', MID(jams.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM jams WHERE id = jams.id + matkuls.sks - 1)) AS jam_kuliah"),
            'matkuls.nama as nama_mk',
            'matkuls.sks AS sks',
            'matkuls.semester AS semester',
            'pengampus.kelas AS kelas',
            'dosens.nama AS dosen',
            'ruangs.nama AS ruang'
        )
        ->leftJoin('pengampus', 'jadkuls.kode_pengampu', '=', 'pengampus.id')
        ->leftJoin('matkuls', 'pengampus.kode_mk', '=', 'matkuls.id')
        ->leftJoin('dosens', 'pengampus.kode_dosen', '=', 'dosens.id')
        ->leftJoin('haris', 'jadkuls.kode_hari', '=', 'haris.id')
        ->leftJoin('ruangs', 'jadkuls.kode_ruang', '=', 'ruangs.id')
        ->leftJoin('jams', 'jadkuls.kode_jam', '=', 'jams.id')
        ->orderBy('haris.id', 'ASC')
        ->orderBy('Jam_Kuliah', 'ASC')
        ->get();

        return $jadkuls;

        //dd($jadkuls);
    }
}
