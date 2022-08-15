<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Genetik;
use App\Http\Controllers\ClassController;

use App\Models\Dosen;
use App\Models\Hari;
use App\Models\Jadkul;
use App\Models\Jam;
use App\Models\Matkul;
use App\Models\Pengampu;
use App\Models\Ruang;
use App\Models\Wkt_tdk_bersedia;

class PenjadwalanController extends Controller
{
    public function index() {
        
        $obj_penjadwalan = new ClassController();
        $data_kelas = $obj_penjadwalan->GetKelas('2011-2012');
        $data_jam = $obj_penjadwalan->GetJam();
        $data_hari = $obj_penjadwalan->GetHari();
        $data_ruang_teori = $obj_penjadwalan->GetRuang('TEORI');
        $data_ruang_praktikum = $obj_penjadwalan->GetRuang('LABORATORIUM');
        $data_time_off_dosen = $obj_penjadwalan->GetTimeOffDosen();

        // var_dump($data_ruang_praktikum);
        // die;

        if(count($data_kelas) == 0){
            
            $data['msg'] = 'Tidak Ada Data dengan Semester dan Tahun Akademik ini <br>Data yang tampil dibawah adalah data dari proses sebelumnya';
            echo $data['msg'];
            

        }else{
            $jenis_semester = '';
            $tahun_akademik = '';
            $jumlah_populasi = 10;
            $crossOver = 0.70;
            $mutasi = 0.40;
            $jumlah_generasi = 10000;
            
            $genetik = new Genetik($jenis_semester,
                                $tahun_akademik,
                                $jumlah_populasi,
                                $crossOver,
                                $mutasi,
                                //~~~~~~BUG!~~~~~~~
                                /*                               
                                1 senin 5
                                2 selasa 4
                                3 rabu 3
                                4 kamis 2
                                5 jumat 1                                 
                                */
                                5,//kode hari jumat                                
                                '4-5-6', //kode jam jumat
                                //jam dhuhur tidak dipake untuk sementara
                                6); //kode jam dhuhur
            $genetik->AmbilData($data_kelas, $data_jam, $data_hari, $data_ruang_teori, $data_ruang_praktikum, $data_time_off_dosen);
            $genetik->Inisialisai();
            
            date_default_timezone_set("Asia/Jakarta");
            $time_start = microtime(true);
            $date_start = date('m/d/Y h:i:s a', time());

            $total_waktu_fitness = 0;
            $total_waktu_seleksi = 0;
            $total_waktu_crossover = 0;
            $total_waktu_mutasi = 0;
            
            $found = false;
            $fitnessAfterMutation = array();
            
            for($i = 0;$i < $jumlah_generasi;$i++ ){
                if (empty($fitnessAfterMutation)) {
                    $t_start = microtime(true);

                    $fitness = $genetik->HitungFitness();

                    $t_end = microtime(true);
                    $total_waktu_fitness += $t_end - $t_start;
                } else {
                    $fitness = $fitnessAfterMutation;
                }
                
                $t_start = microtime(true);

                $genetik->Seleksi($fitness);
                //$child_index = $genetik->StartCrossOver();

                $t_end = microtime(true);
                //echo '<br>seleksi:'.$t_end.'-'.$t_start;
                $total_waktu_seleksi += $t_end - $t_start;

                $t_start = microtime(true);

                $genetik->StartCrossOver();

                $t_end = microtime(true);
                $total_waktu_crossover += $t_end - $t_start;
                
                $t_start = microtime(true);

                //$fitnessAfterMutation = $genetik->Mutasi($fitness, $child_index);
                $fitnessAfterMutation = $genetik->Mutasi($fitness);

                $t_end = microtime(true);
                $total_waktu_mutasi += $t_end - $t_start;

                
                for ($j = 0; $j < count($fitnessAfterMutation); $j++){
                    //test here
                    if($fitnessAfterMutation[$j] == 1){
                    
                    //$this->db->query("TRUNCATE TABLE jadwalkuliah");
                    
                    $jadwal_kuliah = array(array());
                    $jadwal_kuliah = $genetik->GetIndividu($j);
                    
                    
                    //echo "iterasi ke: $i";
                    return($jadwal_kuliah);
                    





                    $obj_penjadwalan->KosongkanJadwal();
                    for($k = 0; $k < count($jadwal_kuliah);$k++) {
                        $obj_penjadwalan->InsertJadwal($jadwal_kuliah[$k][0], $jadwal_kuliah[$k][1], $jadwal_kuliah[$k][2], $jadwal_kuliah[$k][3]);
                    }

                    
                    $found = true;                      
                    }
                    
                    if($found){break;}
                }

                if($found){break;}
            }
            
            if(!$found){
                $data['msg'] = 'Tidak Ditemukan Solusi Optimal';
                echo $data['msg'];
            }
            
        

        $time_end = microtime(true);
        $date_end = date('m/d/Y h:i:s a', time());
        $durasi = $time_end - $time_start;

        echo '<br>generasi: '.$i;
        echo '<br>durasi proses: '.intdiv($durasi, 60) .':' . ($durasi % 60);

        }




        $jadwal = $obj_penjadwalan->GetJadwal();

        foreach ($jadwal as $key => $value) {
            if (++$key%2 == 1) {
                
            } else {
                
            }
            
            $value['NO'] = $key;

           
            
        }

        $table="<table border='1' width='300'";
        $table.="<tr><th>Nama</th><th>Kapasitas</th><th>Jenis</th></tr>";

       
    }
}


//return view('penjadwalan.index', $data, compact('pengampus','jadkuls', 'dosen', 'ruangs', 'class'));


// $data = [
        //     'dosens' => Dosen::get(),
        // ];





        
        // $jadkuls = Jadkul::with('jam', 'hari', 'ruang', 'pengampu')->get();
        // $pengampus = Pengampu::with('dosen', 'matkul')->paginate(20);
        // $day = Hari::select('nama')->groupBy('nama')->pluck('nama', 'nama');
        // $class = Pengampu::select('kelas')->groupBy('kelas')->pluck('kelas', 'kelas');