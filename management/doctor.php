<?php 
include "./management/user.php";
require_once "./config/confin_db.php";
class Doctor extends User {
    public $specialization ;
    
    public $connection ;
    public function __construct($first_name = null, $last_name = null, $phone_number = null, $email = null , $specialization = null)
    {
        parent::__construct($first_name, $last_name, $phone_number, $email);
        $this->specialization = $specialization;
         
        $db = new Database();
        $this->connection = $db->getConnect();

    }
    
    //find by id 
      public function findByID($id)
    {
        $query = "SELECT * FROM doctors  WHERE doctor_id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "_______________________________________________" . "\n";
            foreach ($result as $row) {

                echo "ID : "  . $row['doctor_id'] . "\n";
                echo   "First name : " . $row['first_name'] . "\n";
                echo   "Last name : " . $row['last_name'] . "\n";
                echo   "Email :"  . $row['email'] . "\n";
                echo   "Phone Number : " . $row['phone_number'] . "\n";
                echo   "Gender : " . $row['specialization'] . "\n";
                echo "_______________________________________________" . "\n";
            }

        }
    }
    //add doctor 
    public function addDoctor($data){
       $query = "INSERT INTO doctors (first_name, last_name, email, phone_number, specialization) 
                  VALUES(:first_name, :last_name, :email, :phone_number, :specialization)";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":first_name", $data['first_name']);
        $stmt->bindParam(":last_name", $data['last_name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":phone_number", $data['phone_number']);
        $stmt->bindParam(":specialization", $data['specialization']);
       

        if ($stmt->execute()) {
            echo "Doctor added successfully\n";
        } else {
            echo "Adding doctor failed\n";
        }
    }

    //edit doctor 
    public function editDoctor($data){
        $query = "UPDATE doctors SET  
          first_name = :first_name  , 
          last_name = :last_name,
          email = :email ,
          phone_number = :phone_number , 
          specialization = :specialization            
          WHERE doctor_id = :id";

        $id = $data['id'];
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":first_name", $data['first_name']);
        $stmt->bindParam(":last_name", $data['last_name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":phone_number", $data['phone_number']);
        $stmt->bindParam(":specialization", $data['specialization']);
        if ($stmt->execute()) {
            echo "doctor UPDATED succussfuly" . "\n";
        } else {
            echo "UPDATED failed" . "\n";
        }
    }

    //delete doctor
    public function deleteDoctor($id){
          printf("Are you sure want delete ? (yes/no)");
        $choice = trim(fgets((STDIN)));
        switch ($choice) {
            case "yes":
                $query = "DELETE FROM doctors WHERE doctor_id = :id";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(":id", $id);
                if ($stmt->execute()) {
                    echo "doctor deleted succussfuly";
                }
                break;
            case "no":
                include "./index.php";
                break;
        }
    }

    //display all doctors 
    public function displayAllDoctors(){
            $query = "SELECT doctors.* , departements.departement_name AS dep_name FROM doctors left join departements on departements.departement_id = doctors.id_departement";
        $stmt = $this->connection->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                echo "_______________________________________________" . "\n";
                echo "ID : "  . $row['doctor_id'] . "\n";
                echo   "First name : " . $row['first_name'] . "\n";
                echo   "Last name : " . $row['last_name'] . "\n";
                echo   "Email :"  . $row['email'] . "\n";
                echo   "Phone Number : " . $row['phone_number'] . "\n";
                echo   "specialization : " . $row['specialization'] . "\n";
                echo   "departement name : " . $row['dep_name'] . "\n";
                echo "_______________________________________________" . "\n";
            }
        }
    }


}