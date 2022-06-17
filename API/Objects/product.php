<?php

class Product
{


    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $brand_id;
    public $ingredient1;
    public $ingredient2;
    public $ingredient3;
    public $ingredient4;
    public $image_1;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        $query = "SELECT
                 p.id, p.name, p.description, p.price, p.brand_id,p.ingredient1,p.ingredient2,p.ingredient3,p.ingredient4, p.image_1
            FROM
                " . $this->table_name . " p";


        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function readOne()
    {

        $query = "SELECT
                 p.id, p.name, p.description, p.price, p.brand_id, p.ingredient1,p.ingredient2,p.ingredient3,p.ingredient4,p.image_1
            FROM
                " . $this->table_name . " p
                
            WHERE
                p.id =" . $this->id . "
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->brand_id = $row['brand_id'];
        $this->ingredient1 = $row['ingredient1'];
        $this->ingredient2 = $row['ingredient2'];
        $this->ingredient3 = $row['ingredient3'];
        $this->ingredient4 = $row['ingredient4'];
        $this->image_1 = $row['image_1'];
    }
    function readByName(){
        $query = $this->conn->prepare("SELECT * FROM $this->table_name WHERE name=:name");
        $query->bindParam("name", $this->name, PDO::PARAM_STR);

        $query->execute();
       return $query;
    }
    function readByIngredient(){
        $query = $this->conn->prepare("SELECT * FROM $this->table_name WHERE ingredient1=:ingredient or ingredient2=:ingredient or ingredient3=:ingredient or ingredient4=:ingredient");
        $query->bindParam("ingredient", $this->ingredient1, PDO::PARAM_STR);

        $query->execute();
        return $query;

    }
    function readByBrandId(){
        $query = $this->conn->prepare("SELECT * FROM $this->table_name WHERE brand_id=:brand_id");
        $query->bindParam("brand_id", $this->brand_id, PDO::PARAM_STR);

        $query->execute();
        return $query;
    }


}

?>