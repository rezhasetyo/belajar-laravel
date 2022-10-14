<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Function dan Conditional PHP</title>
</head>
<body>
<h1>Berlatih Function PHP</h1>

<?php
    echo "<h3> Soal No 1 Greetings </h3>";
    function hello($string) {
        echo "Halo $string, Selamat Datang di Sanbercode! <br>";}
    hello("Bagas");
    hello("Wahyu");
    hello("Abdul");
    echo "<br>";


    echo "<h3>Soal No 2 Reverse String</h3>";
    function reverse($kata) {
        $length = strlen($kata);
        $tampung = "";
        for ($i=($length-1); $i >= 0; $i--) { 
            $tampung .= $kata[$i];
        }
        return  $tampung;}
    function reverseString($kata2) {
        $balik = reverse ($kata2);
        echo $balik . "<br>";
    }
    reverseString("abduh");
    reverseString("Sanbercode");
    reverseString("We Are Sanbers Developers");
    echo "<br>";


    echo "<h3>Soal No 3 Palindrome</h3>";
    function palindrome($kata3){
        $balik  = reverse($kata3);
        if ($kata3 == $balik){
            echo $kata3 . " => True <br>";
        }else {
            echo $kata3 . " => False <br>";
        }
    }
    palindrome("civic") ; // true
    palindrome("nababan") ; // true
    palindrome("jambaban"); // false
    palindrome("racecar"); // true
    echo "<br>";


    echo "<h3>Soal No 4 Tentukan Nilai </h3>";
    function tentukan_nilai($int){
        $tampung = " ";

        if($int <= 100 && $int >= 86 ){
            $tampung .= "Sangat Baik";
        }elseif($int <= 85 && $int >= 70){
            $tampung .= "Baik";
        }elseif ($int <= 69 && $int >= 60){
            $tampung .= "Cukup";
        }else {
            $tampung .= "Kurang";
            }
        return $tampung . "<br>";
        }
    echo tentukan_nilai(98); //Sangat Baik
    echo tentukan_nilai(76); //Baik
    echo tentukan_nilai(67); //Cukup
    echo tentukan_nilai(43); //Kurang

?>





</body>
</html>