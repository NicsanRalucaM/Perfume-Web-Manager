<?php

include_once '../API/Config/database.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_POST['submit']))
{


    $fileMimes = array('text/csv',
    );


    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {


        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');


        fgetcsv($csvFile);


        while (($row = fgetcsv($csvFile, 100000, ",")) !== FALSE)
        {

            $name = $row[0];
            $description = $row[1];
            $price = $row[2];
            $ingredient1 = $row[3];
            $ingredient2 = $row[4];
            $ingredient3 = $row[5];
            $ingredient4 = $row[6];
            $image_1 = $row[7];
            $brand_id = $row[8];
            $gen = $row[9];
            $anotimp = $row[10];
            $stoc = $row[11];
            echo $row[0], $row[1];
            $stmt = $db->prepare("INSERT INTO products (name,description,price,ingredient1,ingredient2,ingredient3,ingredient4,image_1,brand_id,gen,anotimp,stoc) VALUES ('" . $name . " ','" . $description . "','" . $price . "','" . $ingredient1  . "','" . $ingredient2 . "','" . $ingredient3 . "','" . $ingredient4 . "','" . $image_1 . "','" . $brand_id . "','" . $gen . "','" . $anotimp . "','" . $stoc . "')");
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