<?php
include "./management/uesr.php";
require_once "./config/confin_db.php";
//extend class patients from user 
class Patient extends user
{
    // add other proprty to patient
    public $age;
    public $gender;
    public $adress;
    
    private  $connection ;
    function __construct(
        $first_name = null,
        $last_name = null,
        $phone_number = null,
        $email = null,
        $age = null,
        $gender = null,
        $adress = null
    ) {
        $db = new Database();
        $this->connection = $db->Connect();
        
        parent::__construct($first_name , $last_name , $phone_number , $email);
        $this->age = $age;
        $this->gender = $gender;
        $this->adress = $adress;

    }

    public function addPatient($data){
      

    

          $query = "INSERT INTO patients (first_name , last_name , email , age ,phone_number , gender ,adress ) 
                 VALUES(:first_name , :last_name , :email , :age ,:phone_number, :gender ,:adress)";
       $stmt = $this->connection->prepare($query);
       $stmt->bindParam(":first_name" , $data['first_name']);
       $stmt->bindParam(":last_name" , $data['last_name']);
       $stmt->bindParam(":email" , $data['email']);
       $stmt->bindParam(":age" , $data['age']);
       $stmt->bindParam(":phone_number" , $data['phone_number']);
       $stmt->bindParam(":gender" , $data['gender']);
       $stmt->bindParam(":adress" , $data['adress']);
       
       if($stmt->execute()){
           echo "Patients added succussfuly" . "\n";
        }else{
            echo "added failed" . "\n";
        }
    

    }
}
