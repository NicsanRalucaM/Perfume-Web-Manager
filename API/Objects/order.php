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

    public function post()
    {
        $query = $this->conn->prepare("INSERT INTO " . $this->table_name . "  (user,address,product1,product2,product3,product4,product5,product6,product7,product8,product9,product10,price,name,email) values(:user,:address,:product1,:product2,:product3,:product4,:product5,:product6,:product7,:product8,:product9,:product10,:price,:name,:email)");
        $query->bindParam("user", $this->user, PDO::PARAM_STR);
        $query->bindParam("address", $this->address, PDO::PARAM_STR);
        $query->bindParam("product1", $this->product1, PDO::PARAM_STR);
        $query->bindParam("product2", $this->product2, PDO::PARAM_STR);
        $query->bindParam("product3", $this->product3, PDO::PARAM_STR);
        $query->bindParam("product4", $this->product4, PDO::PARAM_STR);
        $query->bindParam("product5", $this->product5, PDO::PARAM_STR);
        $query->bindParam("product6", $this->product6, PDO::PARAM_STR);
        $query->bindParam("product7", $this->product7, PDO::PARAM_STR);
        $query->bindParam("product8", $this->product8, PDO::PARAM_STR);
        $query->bindParam("product9", $this->product9, PDO::PARAM_STR);
        $query->bindParam("product10", $this->product10, PDO::PARAM_STR);
        $query->bindParam("price", $this->price, PDO::PARAM_STR);
        $query->bindParam("name", $this->name, PDO::PARAM_STR);
        $query->bindParam("email", $this->email, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return "post ok";
    }

    function readOne()
    {

        $query = "SELECT
               * FROM
                " . $this->table_name . " p
                
            WHERE
                p.user =" . $this->user . "
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->price = $row['price'];
        $this->address = $row['address'];
        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->product1 = $row['product1'];
        $this->product2 = $row['product2'];
        $this->product3 = $row['product3'];
        $this->product4 = $row['produc4'];
        $this->product5 = $row['product5'];
        $this->product6 = $row['product6'];
        $this->product7 = $row['product7'];
        $this->product8 = $row['product8'];
        $this->product9 = $row['product9'];
        $this->product10 = $row['product10'];

    }
    function read(){
        $query = $this->conn->prepare("SELECT * FROM $this->table_name WHERE user=:user");
        $query->bindParam("user", $this->user, PDO::PARAM_STR);

        $query->execute();
        return $query;
    }

}