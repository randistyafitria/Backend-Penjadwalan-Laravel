<?php

namespace App\Http\Controllers\sqls;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenjadwalanSql extends Controller
{
    public function index() {

        //KELAS, MATKUL, SKS, SEMESTER, DOSEN
        $sql['get_kelas'] = "
        SELECT
        a.kode, 
        b.sks, 
        a.kode_dosen, 
        b.jenis
        FROM pengampu a
        LEFT JOIN matakuliah b ON a.kode_mk = b.kode
        WHERE b.semester %% 2 = 0
        AND a.tahun_akademik = '%s'
        ";

        $sql['get_jam'] = "
        SELECT
        kode
        FROM jam
        ";

        $sql['get_hari'] = "
        SELECT
        kode
        FROM hari
        ";

        //RUANG brdsrkn JENIS
        $sql['get_ruang'] = "
        SELECT
        kode
        FROM ruang
        WHERE jenis = '%s'
        ";

        //lihat waktu kosong
        $sql['get_time_off_dosen'] = "
        SELECT
        kode_dosen,
        CONCAT_WS(':',kode_hari,kode_jam) AS kode_hari_jam
        FROM waktu_tidak_bersedia
        ";

        $sql['kosongkan_jadwal'] = "
        TRUNCATE TABLE
        jadwalkuliah
        ";

        //HARI, SESI, JAM, RUANG
        $sql['insert_jadwal'] = "
        INSERT INTO jadwalkuliah
        (kode_pengampu, kode_jam, kode_hari, kode_ruang)
        VALUES ('%s', '%s', '%s', '%s')
        ";

        /*$sql['get_jadwal'] = "
        SELECT    
        mk.nama AS nama_mk,
        sks,
        semester,
        mk.jenis,
        kelas,
        d.nama AS nama_dosen,
        h.nama AS hari,
        jam.kode AS jamke,
        range_jam AS pukul,
        r.nama AS ruang
        FROM jadwalkuliah j
        INNER JOIN pengampu p ON p.kode = j.kode_pengampu
        LEFT JOIN matakuliah mk ON mk.kode = p.kode_mk
        LEFT JOIN dosen d ON d.kode = p.kode_dosen
        LEFT JOIN hari h ON h.kode = j.kode_hari
        LEFT JOIN jam ON jam.kode = j.kode_jam
        LEFT JOIN ruang r ON r.kode = j.kode_ruang
        ORDER BY mk.nama, kelas
        ";*/

        $sql['get_jadwal'] = "
        SELECT
        e.nama AS hari, 
        #CONCAT_WS('-', CONCAT('(', g.kode), CONCAT( (SELECT kode FROM jam WHERE kode = (SELECT jm.kode FROM jam jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1)),')')) AS sesi, 
        #CONCAT_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM jam WHERE kode = (SELECT jm.kode FROM jam jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1))) AS jam_kuliah, 
        CONCAT('(',g.kode, '-', g.kode + c.sks - 1,')') AS sesi,
        CONCAT_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM jam WHERE kode = g.kode + c.sks - 1)) AS jam_kuliah, 
        c.nama AS nama_mk, 
        c.sks AS sks, 
        c.semester AS semester, 
        b.kelas AS kelas, 
        d.nama AS dosen, 
        f.nama AS ruang 
        FROM jadwalkuliah a 
        LEFT JOIN pengampu b ON a.kode_pengampu = b.kode 
        LEFT JOIN matakuliah c ON b.kode_mk = c.kode 
        LEFT JOIN dosen d ON b.kode_dosen = d.kode 
        LEFT JOIN hari e ON a.kode_hari = e.kode 
        LEFT JOIN ruang f ON a.kode_ruang = f.kode 
        LEFT JOIN jam g ON a.kode_jam = g.kode 
        ORDER BY e.kode ASC, Jam_Kuliah ASC
        ";

        /*$sql['get_jadwal'] = "SELECT  e.nama as hari,".
                            "          Concat_WS('-',  concat('(', g.kode), concat( (SELECT kode".  
                            "                                  FROM jam ". 
                            "                                  WHERE kode = (SELECT jm.kode ".
                            "                                                FROM jam jm  ".
                            "                                                WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1)),')')) as sesi, ". 
                            "       Concat_WS('-', MID(g.range_jam,1,5),".
                            "                (SELECT MID(range_jam,7,5) ".
                            "                 FROM jam ".
                            "                 WHERE kode = (SELECT jm.kode ".
                            "                               FROM jam jm ".
                            "                               WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1))) as jam_kuliah, ".
                
                            "        c.nama as nama_mk,".
                            "        c.sks as sks,".
                            "        c.semester as semester,".
                            "        b.kelas as kelas,".
                            "        d.nama as dosen,".
                            "        f.nama as ruang ".
                            "FROM jadwalkuliah a ".
                            "LEFT JOIN pengampu b ".
                            "ON a.kode_pengampu = b.kode ".
                            "LEFT JOIN matakuliah c ".
                            "ON b.kode_mk = c.kode ".
                            "LEFT JOIN dosen d ".
                            "ON b.kode_dosen = d.kode ".
                            "LEFT JOIN hari e ".
                            "ON a.kode_hari = e.kode ".
                            "LEFT JOIN ruang f ".
                            "ON a.kode_ruang = f.kode ".
                            "LEFT JOIN jam g ".
                            "ON a.kode_jam = g.kode ".
                            "order by e.kode asc,Jam_Kuliah asc";*/
    }
}
