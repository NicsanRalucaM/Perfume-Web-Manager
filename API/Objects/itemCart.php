<?php
class itemCart
{


    private $conn;
    private $table_name = "orders";

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
}