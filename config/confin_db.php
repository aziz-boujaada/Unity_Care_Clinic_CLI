<?php
class Database {
   private $servername = "your_host_name";
    private $username = "your_user_name" ;
    private $password = "your_password";
    private $db_name = "your_database_name";
    private $conn ;
    function Connect(){
        try{
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->db_name" ,$this->username , $this->password);
            if($this->conn){
                echo "Connected successfuly" . "\n";
                return $this->conn ; 
            }
        }catch(PDOException $error){
             echo "connect failed" . $error->getMessage();
        }

    }

}
