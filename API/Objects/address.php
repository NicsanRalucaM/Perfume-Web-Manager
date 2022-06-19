<?php
class Address
{


    private $conn;
    private $table_name = "addresses";

    public $id;
    public $user;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $time;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function  post()
    {

        $query = $this->conn->prepare("INSERT INTO " .$this->table_name .  "  ( user, address,city,state,zip,time) values(:user,:address,:city,:state,:zip,:time)");
        $query->bindParam("user", $this->user, PDO::PARAM_STR);
        $query->bindParam("address", $this->address, PDO::PARAM_STR);
        $query->bindParam("city", $this->city, PDO::PARAM_STR);
        $query->bindParam("state", $this->state, PDO::PARAM_STR);
        $query->bindParam("zip", $this->zip, PDO::PARAM_STR);
        $query->bindParam("time", $this->time, PDO::PARAM_STR);

        $query->execute();
        $query = $this->conn->prepare("SELECT id FROM $this->table_name WHERE time=:time");
        $query->bindParam("time", $this->time, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['id'];
    }
    function read(){
        $query = "SELECT* 
            FROM
                " . $this->table_name . " u
                
            WHERE
                u.id =" . $this->id . "
            LIMIT
                0,1";


        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->city = $row['city'];
        $this->state = $row['state'];
        $this->zip = $row['zip'];
        $this->address = $row['address'];
        $this->time = $row['time'];
        $this->user = $row['user'];
    }

}