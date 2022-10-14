<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan String</title>
</head>
<body>
    <h1>Contoh Soal</h1>
    <?php
        echo "<h3>Soal No 1</h3>";
        $string1 = "Hello World";
        echo "Kalimat pertama : ". $string1 . "<br>";
        echo "Jumlah karakter : " . strlen($string1) . "<br>";  // spasi juga dihitung
        echo "Jumlah kata : " . str_word_count($string1) . "<br><br>";

        echo "<h3>Soal No 2</h3>";
        $string2 = "Nama saya Rezha";
        echo "Kalimat kedua : ". $string2 . "<br>";
        echo "Kata Pertama : " . substr($string2,0,4) . "<br>";     // (0,4) 0 untuk index awal kata dan 4 untuk panjang kata
        echo "Kata Kedua : " . substr($string2,5,4) . "<br>";       // (5,4) 5 untuk index awal kata dan 4 untuk panjang kata
        echo "Kata Ketiga : " . substr($string2,10,5) . "<br>";     // (10,5) 10 untuk index awal kata dan 5 untuk panjang kata

        echo "<h3>Soal No 3</h3>";
        $string3 = "Selamat Pagi";
        echo "Kalimat ketiga : " . $string3 . "<br>";
        echo "Ganti Kalimat Ketiga : " . str_replace("Pagi", "Malam", $string3);

    ?>
</body>
</html>