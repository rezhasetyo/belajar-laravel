<?php
    // require ('kendaraan.php');       // ini sudah ada di motor.php (cuma bisa require sekali)        // Mengambil fungsi dungsi di kendaraan.php
    require ('motor.php');              // Mengambil fungsi dungsi di motor.php
    $objek = new Kendaraan("mobil");
    // $var = var_dump($objek -> bensin);      // Memakai boolean kalau hasilnya false tidak tampil

    // OBJEK 1
        echo "Nama Kendaraan : " . $objek -> name . "<br>";
        echo "Jumlah Roda : " . $objek -> roda . "<br>";
        echo "Bahan Bakar : " . $objek -> bensin . "<br>";
        echo "<br>";

     // OBJEK 2
        $objek2 = new Motor("motor");
        echo "Nama Kendaraan : " . $objek2 -> name . "<br>";
        echo "Jumlah Roda : " . $objek2 -> roda . "<br>";
        echo "Bahan Bakar : " . $objek2 -> bensin . "<br>";
        $objek2 -> jalan();         // kalau mengedit di fungsinya langsung

?>