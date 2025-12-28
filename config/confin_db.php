<?php
class Database {
   private $servername = "localhost";
    private $username = "root" ;
    private $password = "";
    private $db_name = "unity_care_cli";
    private $conn ;
    
    function getConnect(){
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
