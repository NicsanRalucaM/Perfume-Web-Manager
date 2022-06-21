<?php

class User
{

    private $conn;
    private $table_name = "users";


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

        $query = "SELECT
                 u.id, u.firstname, u.lastname, u.email
            FROM
                " . $this->table_name . " u
                
            WHERE
                u.id =" . $this->id . "
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->email = $row['email'];

    }

    function readData()
    {

        $query = $this->conn->prepare("SELECT * FROM users WHERE id=:id");
        $query->bindParam("id", $this->id, PDO::PARAM_STR);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->email = $row['email'];

    }
    function getId()
    {
        $query = $this->conn->prepare("SELECT id as user_id,firstname as user_firstname,lastname as user_lastname FROM $this->table_name " );
        $query->execute();
        return $query;
    }
}