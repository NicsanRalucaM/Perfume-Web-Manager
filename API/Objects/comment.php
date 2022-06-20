<?php

class Comment
{

    private $conn;
    private $table_name = "comments";


    public $id;
    public $product;
    public $comment;
    public $name;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    function post(){


        $query = $this->conn->prepare("INSERT INTO " .$this->table_name . "  ( product, comment,name) values(:product,:comment,:name)");
        $query->bindParam("product", $this->product, PDO::PARAM_STR);
        $query->bindParam("comment", $this->comment, PDO::PARAM_STR);
        $query->bindParam("name", $this->name, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);



        return "post ok";
    }

    function readOne()
    {

        $query = "SELECT
                 *
            FROM
                " . $this->table_name . " c
                
            WHERE
                c.id =" . $this->id . "
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->product = $row['product'];
        $this->comment = $row['comment'];
        $this->name = $row['name'];

    }

    function readData()
    {

        $query = $this->conn->prepare("SELECT * FROM $this->table_name WHERE product=:product order by id desc LIMIT 0,5");
        $query->bindParam("product", $this->product, PDO::PARAM_STR);
        $query->execute();
        return $query;

    }
}