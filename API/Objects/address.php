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

}