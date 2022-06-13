<?php

class User
{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    function readOne()
    {

        // query to read single record
        $query = "SELECT
                 u.id, u.firstname, u.lastname, u.email
            FROM
                " . $this->table_name . " u
                
            WHERE
                u.id =" . $this->id . "
            LIMIT
                0,1";

        // prepare query statement


        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        // get retrieved row

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->email = $row['email'];

    }
    function readEmail(){

        $query = $this->conn->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $this->email, PDO::PARAM_STR);

        $query->execute();


        $row = $query->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id=$row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];


    }
}