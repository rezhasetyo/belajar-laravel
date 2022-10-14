<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array</title>
</head>
<body>
    <h2>Latihan Array</h2>
    <?php
        echo "<h3>Contoh 1</h3>";
        $presiden = ["Jokowi", "SBY", "Naruto", "Sasuke"];
        print_r($presiden);     // Cetak semuanya
        echo "<br><br>";

        echo "<h3>Contoh 2</h3>";
        echo "Total Presiden " . count($presiden);
        echo "<ol>";
            echo "<li>" . $presiden[0] . "</li>";
            echo "<li>" . $presiden[1] . "</li>";
            echo "<li>" . $presiden[2] . "</li>";
            echo "<li>" . $presiden[3] . "</li>";
        echo  "</ol>";
        echo "<br><br>";

        echo "<h3>Contoh 3</h3>";   // Array Multidiensional
        // $menteri = [
        //     ["Luhut", 67, "Perdana Menteri"],
        //     ["Juliari", 56, "Menteri Sosial"],
        //     ["Susi", 52, "Menteri Laut"],];
        $menteri = [       //Array Asosisatif
            [ "nama" => "Luhut", "umur" => 67, "jabatan" => "Perdana Menteri"],
            [ "nama" => "Juliari", "umur" => 56, "jabatan" => "Menteri Sosial"],
            [ "nama" => "Susi", "umur" => 52, "jabatan" => "Menteri Laut"]];
        echo "<pre>";
        print_r($menteri);
        echo "</pre>";

    ?>
</body>
</html>