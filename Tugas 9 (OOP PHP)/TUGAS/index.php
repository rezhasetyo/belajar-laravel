<?php
    require_once ('frog.php');
    require_once ('ape.php');
    $sheep = new Animal("shaun");

    // OBJEK ANIMAL
        echo "Name : " . $sheep -> name . "<br>";
        echo "Legs : " . $sheep -> legs . "<br>";
        echo "Cold Blooded : " . $sheep -> cold_blooded . "<br>";
        echo "<br>";

    // OBJEK FROG
        $kodok = new Frog("Buduk");
        echo "Name : " . $kodok -> name . "<br>";
        echo "Legs : " . $kodok -> legs . "<br>";
        echo "Cold Blooded : " . $kodok -> cold_blooded . "<br>";
        $kodok -> jump();   
        echo "<br><br>";

     // OBJEK SUNGOKONG
        $sungokong = new Ape("kera sakti");
        echo "Name : " . $sungokong -> name . "<br>";
        echo "Legs : " . $sungokong -> legs . "<br>";
        echo "Cold Blooded : " . $sungokong -> cold_blooded . "<br>";
        $sungokong -> yell();         

?>