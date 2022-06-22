<?php

include_once '../API/Config/database.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_POST['submit']))
{


    $file = array('text/csv');


    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file))
    {

        $csvFile =  fopen($_FILES['file']['tmp_name'], 'r');


        fgetcsv($csvFile);


        while (($row = fgetcsv($csvFile)) !== FALSE) {
            $id = $row[0];
            $name = $row[1];
            $description = $row[2];
            $price = $row[3];
            $ingredient1 = $row[4];
            $ingredient2 = $row[5];
            $ingredient3 = $row[6];
            $ingredient4 = $row[7];
            $image_1 = $row[8];
            $brand_id = $row[9];
            $gen = $row[10];
            $anotimp = $row[11];
            $stoc = $row[12];
            echo $row[0], $row[1];
            $stmt = $db->prepare("INSERT INTO products (id,name,description,price,ingredient1,ingredient2,ingredient3,ingredient4,image_1,brand_id,gen,anotimp,stoc) VALUES ('" . $id . "', '" . $name . " ','" . $description . "','" . $price . "','" . $ingredient1  . "','" . $ingredient2 . "','" . $ingredient3 . "','" . $ingredient4 . "','" . $image_1 . "','" . $brand_id . "','" . $gen . "','" . $anotimp . "','" . $stoc . "')");
            $stmt->execute();
        }


        fclose($csvFile);

        header("Location: rapoarte.html");

    }
    else
    {
        echo "Please select valid file";
    }
}