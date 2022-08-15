<?php

namespace App\Http\Controllers\sqls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Koneksi extends Controller
{
        private $server;
        private $user;
        private $password;
        private $database;
        
        private $sql;

        private $db_conn;
        
        protected $sql_file = NULL;
        protected $query;
        
        function __construct() {
            // konfigurasi koneksi database

            $this->server = 'localhost:3300';
            $this->user = 'root';
            $this->password = '';
            $this->database = 'db';
            
            //$this->BuatKoneksi();
            $this->SiapkanQuery();
        }
    
        // function BuatKoneksi() {
        //     // koneksi ke database
        //     $conn = ADONewConnection('mysqli');
        //     //$db->debug = true;
        //     $conn->Connect($this->server, $this->user, $this->password, $this->database);
        //     // -----------------------
            
        //     $this->db_conn = $conn;
        // }
        
        function SiapkanQuery() {
            require_once $this->sql_file;
            $this->query = array();
            $this->query = $sql;
        }
        
        function ExecuteQuery($query, $shouldReturnResult = true) {
            $rs = $this->db_conn->Execute($query);
            //print_r($rs);die;
            if ($shouldReturnResult) {
                return $rs->GetRows();
            }
        }
}
