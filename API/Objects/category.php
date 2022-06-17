<?php

class Category
{


    private $conn;
    private $table_name = "category";

    public $id;
    public $name;
    public $image;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        $query = "SELECT
                 c.id, c.name,c.image
            FROM
                " . $this->table_name . " c";


        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function readOne()
    {

        $query = "SELECT
                 c.id, c.name,c.image
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
        $this->name = $row['name'];
        $this->image = $row['image'];

    }
    function readByName()
    {

        $query = $this->conn->prepare("SELECT * FROM $this->table_name WHERE name=:name");
        $query->bindParam("name", $this->name, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];

    }
}

?>