<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Looping</title>
</head>
<body>
    <h1>Latihan Looping</h1>
    <?php
        echo "<h3>Contoh Looping Pertama</h3>";
        for($i=1; $i<=21; $i+=2) {
            echo $i . " - Angka Ganjil <br>";}
        echo "<br>";
        for($a=21; $a>=1; $a-=2){
            echo $a . " - Angka Ganjil <br>";}
        // echo "<br>";
        

        echo "<h3>Contoh Looping Kedua</h3>";
        $nomor = [4, 5, 2, 3, 9];
        print_r($nomor);
        echo "<br>";
        foreach ($nomor as $nom) {
            $rest[] = $nom *2;}
        print_r($rest);
        echo "<br>";


        echo "<h3>Contoh Looping Ketiga</h3>";
        $bio = [
            ["Rezha", 20, "Semarang"],
            ["Joko", 60, "Solo"],
            ["Naruto", 30, "Konoha"]];
        foreach ($bio as $key => $val) {
            $bio = array(
                'nama' => $val[0],
                'umur' => $val[1],
                'kota' => $val[2]
            );
            print_r($bio);
            echo "<br>";}


        echo "<h3>Contoh Looping Keempat</h3>";
        for ($j = 1; $j <= 5; $j++) {
            for ($k = $j; $k <= 5; $k++) {
                echo "*";}
            echo "<br>";
        }
       



    ?>
</body>
</html>