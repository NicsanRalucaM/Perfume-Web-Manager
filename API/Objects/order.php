<?php
class Order
{


    private $conn;
    private $table_name = "orders";

    public $id;
    public $user;
    public $address;
    public $product1;
    public $product2;
    public $product3;
    public $product4;
    public $product5;
    public $product6;
    public $product7;
    public $product8;
    public $product9;
    public $product10;
    public $price;
    public $email;
    public $name;
    public function __construct($db)
    {
        $this->conn = $db;
    }
   public  function post(){
        $query = $this->conn->prepare("INSERT INTO " .$this->table_name . "  (user,address,product1,product2,product3,price,name,email) values(:user,:address,:product1,:product2,:product3,:price,:name,:email)");
        $query->bindParam("user", $this->user, PDO::PARAM_STR);
        $query->bindParam("address", $this->address, PDO::PARAM_STR);
        $query->bindParam("product1", $this->product1, PDO::PARAM_STR);
        $query->bindParam("product2", $this->product2, PDO::PARAM_STR);
        $query->bindParam("product3", $this->product3, PDO::PARAM_STR);
        $query->bindParam("price", $this->price, PDO::PARAM_STR);
        $query->bindParam("name", $this->name, PDO::PARAM_STR);
        $query->bindParam("email", $this->email, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return "post ok";
    }

}