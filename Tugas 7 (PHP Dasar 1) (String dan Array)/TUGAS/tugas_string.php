<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas String PHP</title>
</head>
<body>
    <h1>Berlatih String PHP</h1>
    <?php
        echo "<h3>Soal No 1</h3>";
        $first_sentenece = "Hello PHP!";
        echo "Kalimat pertama : ". $first_sentenece . "<br>";
        echo "Panjang string : " . strlen($first_sentenece) . "<br>";
        echo "Jumlah kata : " . str_word_count($first_sentenece) . "<br><br>";
        // Panjang string 10, jumlah kata: 2

        $second_sentence = "I'm ready for the challenges";
        echo "Kalimat kedua : ". $second_sentence . "<br>";
        echo "Panjang string : " . strlen($second_sentence) . "<br>";
        echo "Jumlah kata : " . str_word_count($second_sentence) . "<br><br>";
        // Panjang string: 28,  jumlah kata: 5


        echo "<h3>Soal No 2</h3>";
        $string2 = "I love PHP";
        echo "<label>String: </label> \"$string2\" <br>";
        echo "Kata pertama : " . substr($string2, 0, 1) . "<br>" ; // Lanjutkan di bawah ini
        echo "Kata kedua : " . substr($string2, 2, 4) . "<br>" ;
        echo "Kata ketiga : " . substr($string2, 7, 3) . "<br><br>" ;
        

        echo "<h3>Soal No 3</h3>";
        $string3 = "PHP is old but sexy!";
        echo "String Awal : \"$string3\" " . "<br>";
        echo "Ubah String : " . str_replace("sexy!", "awesome", $string3);
        // OUTPUT : "PHP is old but awesome"

    ?>
</body>
</html>