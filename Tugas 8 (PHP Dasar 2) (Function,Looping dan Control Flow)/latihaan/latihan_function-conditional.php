<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function dan Kondisional</title>
</head>
<body>

<h1>Berlatih Function PHP</h1>
<?php
    echo "<h3>Contoh No 1</h3>";
    function hello($string) {
        echo "Halo nama saya $string, selamat datang <br>";}
    hello("Rezha");
    hello("Setyo");
    hello("Atmojo");



    echo "<h3>Contoh No 2</h3>";
    function reverse($kata) {
        $length = strlen($kata);
        $tampung = "";  //Jangan ada spasi
        for ($i=($length-1); $i >= 0; $i--) { 
            $tampung .= $kata[$i];      // $tampung .=      ===>    $tampung = $tampung .
        }
        return  $tampung;}
    function reverseString($kata2) {
        $balik = reverse ($kata2);
        echo $balik . "<br>";
    }

    reverseString("Rezha");
    reverseString("SanberCode");
    reverseString("We Are Rezha Sanbercode");
    echo "<br>";



    echo "<h3>Contoh No 3</h3>";
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



    echo "<h3>Contoh No 4</h3>";
    function tentukan_nilai($int){
        $tampung = " ";

        if($int >= 50){
            $tampung .= "Usia Lansia";
        }elseif($int <= 50 && $int >= 28){
            $tampung .= "Usia Dewasa";
        }elseif ($int <= 28 && $int >= 17){
            $tampung .= "Usia Remaja";
        }else {
            $tampung .= "Usia Balita";
            }
        return $tampung . "<br>";
        }
        
    // function tentukan_nilai($int){
    //     if($int >= 50){
    //         return "Usia Lansia <br>";
    //     }elseif($int <= 50 && $int >= 28){
    //         return "Usia Dewasa <br>";
    //     }elseif ($int <= 28 && $int >= 17){
    //         return "Usia Remaja <br>";
    //     }else {
    //         return "Usia Balita <br>";
    //     }
    // }

    echo tentukan_nilai(80);
    echo tentukan_nilai(35);
    echo tentukan_nilai(21);
    echo tentukan_nilai(7);

?>






    
</body>
</html>