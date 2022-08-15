<?php

namespace App\Http\Controllers\sqls;

use Illuminate\Http\Request;
use App\Http\Controllers\sqls\Koneksi;
use App\Http\Controllers\sqls\PenjadwalanSql;

class Penjadwalan extends Koneksi
{
      protected $sql_file = 'PenjadwalanSql.php';

      function __construct() {
         parent::__construct();
      }
      
      function GetKelas($param) {
         $qw = sprintf($this->query['get_kelas'], $param);
         $result = $this->ExecuteQuery($qw);
         return $result;
      }

      function GetJam() {
         $qw = sprintf($this->query['get_jam']);
         $result = $this->ExecuteQuery($qw);
         return $result;
      }

      function GetHari() {
         $qw = sprintf($this->query['get_hari']);
         $result = $this->ExecuteQuery($qw);
         return $result;
      }
      
      function GetRuang($param) {
         $qw = sprintf($this->query['get_ruang'], $param);
         $result = $this->ExecuteQuery($qw);
         return $result;
      }

      function GetTimeOffDosen() {
         $qw = sprintf($this->query['get_time_off_dosen']);
         $result = $this->ExecuteQuery($qw);
         return $result;
      }

      function KosongkanJadwal() {
         $qw = sprintf($this->query['kosongkan_jadwal']);
         $result = $this->ExecuteQuery($qw, false);
         return $result;
      }

      function InsertJadwal($kode_pengampu, $kode_jam, $kode_hari, $kode_ruang) {
         $qw = sprintf($this->query['insert_jadwal'], $kode_pengampu, $kode_jam, $kode_hari, $kode_ruang);
         $result = $this->ExecuteQuery($qw, false);
         return $result;
      }

      function GetJadwal() {
         $qw = sprintf($this->query['get_jadwal']);
         $result = $this->ExecuteQuery($qw);
         return $result;
      }
}
