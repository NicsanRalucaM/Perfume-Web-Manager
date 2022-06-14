<?php

class Product
{


    private $conn;
    private $table_name = "product";

    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $ingredient1;
    public $ingredient2;
    public $ingredient3;
    public $ingredient4;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        $query = "SELECT
                 p.id, p.name, p.description, p.price, p.category_id,p.ingredient1,p.ingredient2,p.ingredient3,p.ingredient4
            FROM
                " . $this->table_name . " p";


        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function readOne()
    {

        $query = "SELECT
                 p.id, p.name, p.description, p.price, p.category_id, p.ingredient1,p.ingredient2,p.ingredient3,p.ingredient4
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
        $this->category_id = $row['category_id'];
        $this->ingredient1=$row['ingredient1'];
        $this->ingredient2=$row['ingredient2'];
        $this->ingredient3=$row['ingredient3'];
        $this->ingredient4=$row['ingredient4'];

    }


}

?>