<?php
class Database{

    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = 'web';
    private $port = "8111";

    public function getConnection(){

        $this->conn = null;

        try{
            $dsn = "mysql:host=$this->host;dbname=$this->database;port=$this->port";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>