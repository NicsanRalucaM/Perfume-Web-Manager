<?php
class itemCart
{


    private $conn;
    private $table_name = "carts";

    public $id;
    public $user;
    public $product;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    function post(){


        $query = $this->conn->prepare("INSERT INTO " .$this->table_name . "  ( user, product) values(:user,:product)");
        $query->bindParam("user", $this->user, PDO::PARAM_STR);
        $query->bindParam("product", $this->product, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);



        return "post ok";
    }
    function  count(){
        $query= $this->conn->prepare("SELECT count(*) as nr from " .$this->table_name . " where user = :user");
        $query->bindParam("user",$this->user,PDO::PARAM_STR);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row['nr'];
    }
    function readUser()
    {

        $query = "SELECT
                 p.id, p.user, p.product
            FROM
                " . $this->table_name . " p
                where
               p.user =" . $this->user;


        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    function remove(){


        $query = $this->conn->prepare("DELETE FROM " .$this->table_name . "  WHERE  id=:id");
        $query->bindParam("id", $this->id, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);



        return "post ok";
    }
    function removeByUser()
    {
        $sql = "DELETE FROM " . $this->table_name . "  WHERE  user=:user";
        // Prepare statement
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("user", $this->user, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();

    }
}