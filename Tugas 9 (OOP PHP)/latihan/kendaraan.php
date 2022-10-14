<?php
    class Kendaraan{
        public $name;
        public $roda = 4;
        public $bensin = "true";
        // public $bensin = true;       // Memakai boolean kalau hasilnya false tidak tampil


        public function __construct($string){
            $this -> name = $string;
        }
    }
?>