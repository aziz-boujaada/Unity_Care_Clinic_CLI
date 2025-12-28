<?php 
require_once './config/confin_db.php';

class Departement{
    public  $connection;
    public $departement_name;
    public $departement_location;

    public function __construct()
    {
        $db = new Database();   
        $this->connection = $db->getConnect();
    }
 //find by id 
      public function findByID($id)
    {
        $query = "SELECT * FROM departements  WHERE departement_id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "_______________________________________________" . "\n";
            foreach ($result as $row) {

                echo "ID : "  . $row['departement_id'] . "\n";
                echo   "Departement Name : " . $row['departement_name'] . "\n";
                echo   "Departement Location: " . $row['departement_location'] . "\n";             
                echo "_______________________________________________" . "\n";
            }

        }
    }
    //add doctor 
    public function addDeprtement($data){
       $query = "INSERT INTO departements (departement_name, departement_location) 
                  VALUES(:departement_name, :departement_location)";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":departement_name", $data['departement_name']);
        $stmt->bindParam(":departement_location", $data['departement_location']);
      
       

        if ($stmt->execute()) {
            echo "Departement added successfully\n";
        } else {
            echo "Adding doctor failed\n";
        }
    }

    //edit doctor 
    public function editDepartement($data){
        $query = "UPDATE departements SET  
          departement_name = :departement_name  , 
          departement_location = :departement_location,           
          WHERE departement_id = :id";

        $id = $data['id'];
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":departement_name", $data['departement_name']);
        $stmt->bindParam(":departement_location", $data['departement_location']);

        if ($stmt->execute()) {
            echo "departement UPDATED succussfuly" . "\n";
        } else {
            echo "UPDATED failed" . "\n";
        }
    }

    //delete deapartement
    public function deleteDepartment($id){
          printf("Are you sure want delete ? (yes/no)");
        $choice = trim(fgets((STDIN)));
        
        switch ($choice) {
            case "yes":
                $query = "DELETE FROM departements WHERE departement_id = :id";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(":id", $id);
                if ($stmt->execute()) {
                    echo "Departement deleted succussfuly";
                }
                break;
            case "no":
                include "./index.php";
                break;
        }
    }

    //display all departements 
    public function displayAllDepartements(){
            $query = "SELECT * FROM departements";
        $stmt = $this->connection->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                echo "_______________________________________________" . "\n";
                echo "ID : "  . $row['doctor_id'] . "\n";
                echo   "First name : " . $row['departement_name'] . "\n";
                echo   "Last name : " . $row['departement_location'] . "\n";
                echo "_______________________________________________" . "\n";
            }
        }
    }
  
}