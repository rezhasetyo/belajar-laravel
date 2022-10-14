<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Array</title>
</head>
<body>
    <h3>Tugas Array</h1>
    <?php
        echo "<h3> Soal 1 </h3>";
        $kids = ["Mike", "Dustin", "Will", "Lucas", "Max", "Eleven"] ;
        $adults = ["Hooper", "Nancy", "Joyce", "Jonathan", "Murray"];
        print_r($kids);
        echo "<br>";
        print_r($adults);
        // echo "<br><br>";



        echo "<h3> Soal 2 </h3>";
        echo "Total Anak-Anak : " . count($kids);
        echo "<ol>";
            echo "<li>" . $kids[0] . "</li>";
            echo "<li>" . $kids[1] . "</li>";
            echo "<li>" . $kids[2] . "</li>";
            echo "<li>" . $kids[3] . "</li>";
            echo "<li>" . $kids[4] . "</li>";
            echo "<li>" . $kids[5] . "</li>";
        echo  "</ol>";
        // echo "<br>";

        echo "Total Orang Dewasa : " . count($adults);
        echo "<ol>";
            echo "<li>" . $adults[0] . "</li>";
            echo "<li>" . $adults[1] . "</li>";
            echo "<li>" . $adults[2] . "</li>";
            echo "<li>" . $adults[3] . "</li>";
            echo "<li>" . $adults[4] . "</li>";
        echo  "</ol>";
        
        

        echo "<h3> Soal 2 </h3>";
        $strangthing = [
            ["Name" => "Will Byers",
             "Age" => 12, 
             "Aliases" => "Will th Wise", 
             "Status" => "Alive"],

            ["Name" => "Mike Wheeler",
             "Age" => 12, 
             "Aliases" => "Dugong Master", 
             "Status" => "Alive"],

            ["Name" => "Jim Hooper",
             "Age" => 12, 
             "Aliases" => "Chief Hooper", 
             "Status" => "Deceased"],

            ["Name" => "Eleven",
             "Age" => 12, 
             "Aliases" => "El", 
             "Status" => "Alive"]];

        echo "<pre>";
        print_r($strangthing);
        echo "</pre>";
    ?>



</body>
</html>