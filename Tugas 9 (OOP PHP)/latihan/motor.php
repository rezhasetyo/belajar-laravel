<?php
    require ('kendaraan.php');

    // Extends adalah kelas turunana
    class Motor extends Kendaraan{
        public $roda = 2;

        public function jalan(){
            echo "motor sedang berjalan";
        }
    }
?>