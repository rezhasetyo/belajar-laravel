<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Looping PHP</title>
</head>
<body>
    <h1>Tugas Looping PHP</h1>
    <?php
        echo "<h3>Soal No 1 Looping I Love PHP</h3>";
        for($i=2; $i<=20; $i+=2) {
            echo $i . " - I Love PHP <br>";}
        echo "<br>";
        for($a=20; $a>=2; $a-=2){
            echo $a . " - I Love PHP <br>";}
    
        
        echo "<h3>Soal No 2 Looping Array Modulo </h3>";
        $numbers = [18, 45, 29, 61, 47, 34];
        echo "array numbers: ";
        print_r($numbers);
        echo "<br><br>";
        echo "Array sisa baginya adalah:  "; 
        echo "<br>";
        foreach ($numbers as $nom) {
            $rest[] = $nom % 5;}
        print_r($rest);


        echo "<h3> Soal No 3 Looping Asociative Array </h3>";
        $items = [
            ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpeg'], 
            ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpeg'],
            ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'],
            ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', 'jerry.jpeg']];
        foreach ($items as $key => $val) {
            $items = array(
                'id' => $val[0],
                'name' => $val[1],
                'price' => $val[2],
                'description' => $val[3]);
            print_r($items);
            echo "<br>";}

        
        echo "<h3>Soal No 4 Asterix </h3>";
        echo "Asterix: ";
        echo "<br>";
        for ($j = 1; $j <= 5; $j++) {
            for ($k = 1; $k <= $j; $k++) {
                echo "*";}
            echo "<br>";
        }
    
    
    ?>
</body>
</html>