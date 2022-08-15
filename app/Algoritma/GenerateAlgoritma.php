<?php 

namespace app\Algoritma;

use App\Models\Hari;        //day
use App\Models\Ruang;       //room
use App\Models\Jadkul;      //schedule
use App\Models\Pengampu;    //teach
use App\Models\Jam;         //time
use App\Models\Wkt_tdk_bersedia;    
use DB;

class GenerateAlgoritma
{
    public function randKromosom($kromosom, $count_pengampus, $input_tahun_akademik, $input_semester)
    {
        Jadkul::truncate();

        for ($i = 0; $i < $kromosom; $i++)
        {
            $values = [];
            for ($j = 0; $j < $count_pengampus; $j++)
            {
                $pengampu = Pengampu::whereHas('matkul', function ($query) use ($input_semester)
                {
                    $query->where('matkuls.semester', $input_semester);
                });

                $hari   = Hari::inRandomOrder()->first();
                $pengampu = $pengampu->where('tahun_akademik', $input_tahun_akademik)->inRandomOrder()->first();
                $ruang  = Ruang::where('jenis', $pengampu->matkul->jenis)->inRandomOrder()->first();
                // $time  = Time::where('sks', $teach->course->sks)->inRandomOrder()->first();

                $params = [
                    'kode_pengampu' => $pengampu->id,
                    'kode_hari'   => $hari->id,
                    'kode_jam'  => $jam->id,        //
                    'kode_ruang'  => $ruang->id,
                    'jenis'      => $i + 1,
                ];

                $jadkul = Jadkul::create($params);
            }
            $data[] = $values;
        }

        return $data;
    }

    public function checkPinalty()
    {
        $jadkuls = Jadkul::select(DB::raw('kode_pengampu, kode_jam, kode_hari, count(*) as `jumlah`'))  //type
            ->groupBy('kode_pengampu')
            ->groupBy('kode_jam')
            ->groupBy('kode_hari')
            // ->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_jadkuls = $this->increaseProccess($jadkuls);

        $jadkuls = Jadkul::select(DB::raw('kode_pengampu, kode_hari, kode_ruang, count(*) as `jumlah`'))  //type
            ->groupBy('kode_pengampu')
            ->groupBy('kode_hari')
            ->groupBy('kode_ruang')
            //->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_jadkuls = $this->increaseProccess($jadkuls);

        $jadkuls = Jadkul::select(DB::raw('kode_jam, kode_hari, kode_ruang, count(*) as `jumlah`'))  //type
            ->groupBy('kode_jam')
            ->groupBy('kode_hari')
            ->groupBy('kode_ruang')
            //->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_jadkuls = $this->increaseProccess($jadkuls);

        $jadkuls = Jadkul::join('pengampus', 'pengampus.id', '=', 'jadkuls.kode_pengampu')
            ->join('dosens', 'dosens.id', '=', 'pengampus.kode_dosen')
            ->select(DB::raw('kode_dosen, kode_hari, kode_jam, count(*) as `jumlah`'))     //type
            ->groupBy('kode_dosen')
            ->groupBy('kode_hari')
            ->groupBy('kode_jam')
            //->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_jadkuls = $this->increaseProccess($jadkuls);

        $jadkuls = Jadkul::where('kode_hari', Jadkul::FRIDAY)->whereIn('kode_jam', [12, 19, 24])->get();

        // if (!empty($jadkuls))
        // {
        //     foreach ($jadkuls as $key => $jadkul)
        //     {
        //         $jadkul->value         = $jadkul->value + 1;
        //         $jadkul->value_process = $jadkul->value_process . "+ 1 ";
        //         $jadkul->save();
        //     }
        // }

        $wkt_tdk_bersedias = Wkt_tdk_bersedia::get();

        if (!empty($wkt_tdk_bersedias))
        {
            foreach ($wkt_tdk_bersedias as $k => $wkt_tdk_bersedia)
            {
                $jadkuls = Jadkul::whereHas('pengampu', function ($query) use ($wkt_tdk_bersedia)
                {
                    $query = $query->whereHas('dosen', function ($q) use ($wkt_tdk_bersedia)
                    {
                        $q->where('dosens.id', $wkt_tdk_bersedia->kode_dosen);
                    });
                });

                $jadkuls = $jadkuls->where('kode_hari', $wkt_tdk_bersedia->kode_hari)->where('kode_jam', $wkt_tdk_bersedia->kode_jam)->get();

                // if (!empty($jadkuls))
                // {
                //     foreach ($jadkuls as $key => $jadkul)
                //     {
                //         $jadkul->value         = $jadkul->value + 1;
                //         $jadkul->value_process = $jadkul->value_process . "+ 1 ";
                //         $jadkul->save();
                //     }
                // }

            }
        }

        $jadkuls = Jadkul::get();

        foreach ($jadkuls as $key => $jadkul)
        {
            $jadkul->value = 1 / (1 + $jadkul->value);
            $jadkul->save();
        }

        return $jadkuls;
    }

    public function increaseProccess($jadkuls = '')
    {
        if (!empty($jadkuls))
        {
            foreach ($jadkuls as $key => $jadkul)
            {
                if ($jadkul->jumlah > 1)
                {
                    $jadkul_wheres = Jadkul::where('type', $jadkul->type)->get();
                    foreach ($jadkul_wheres as $key => $jadkul_where)
                    {
                        $jadkul_where->value         = $jadkul_where->value + ($jadkul->jumlah - 1);
                        $jadkul_where->value_process = $jadkul_where->value_process . " + " . ($jadkul->jumlah - 1);
                        $jadkul_where->save();
                    }
                }
            }
        }
        return $jadkuls;
    }

}