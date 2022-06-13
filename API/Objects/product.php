<?php

class Product
{

    // database connection and table name
    private $conn;
    private $table_name = "product";

    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $ingredient1;
    public $ingredient2;
    public $ingredient3;
    public $ingredient4;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // read products
    function read(){

        // select all query
        $query = "SELECT
                 p.id, p.name, p.description, p.price, p.category_id
            FROM
                " . $this->table_name . " p";


        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function readOne(){

        // query to read single record
        $query = "SELECT
                 p.id, p.name, p.description, p.price, p.category_id
            FROM
                " . $this->table_name . " p
                
            WHERE
                p.id =".$this->id."
            LIMIT
                0,1";

        // prepare query statement


        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        // get retrieved row

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];

    }

}

?>