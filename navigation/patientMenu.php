<?php
include "./management/patient.php";

do {
    echo "
     =============== GESTION DES PATIENTS ==================  
    1-Ajouter neuvaux patient
    2-modifier patient 
    3-supprimer patient
    4-affichez tout les patients
    5-return a la menu principal
    _________________________________________________
    ";
    printf("Enter votre choix :");
    $patientChoice = trim(fgets(STDIN));

    switch ($patientChoice) {
        //add new patient choice 
        case 1:
            printf("Enter first name :");
            $first_name = trim(fgets(STDIN));

            printf("Enter your last name");
            $last_name = trim(fgets(STDIN));

            printf("Enter your age");
            $age = trim(fgets(STDIN));

            printf("Enter your email");
            $email = trim(fgets(STDIN));

            printf("Enter your phone number");
            $phone_number = trim(fgets(STDIN));

            printf("Enter your gender (male or female)");
            $gender = trim(fgets(STDIN));

            printf("Enter your adress");
            $adress = trim(fgets(STDIN));

            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "age" => (int)$age,
                "email" => $email,
                "gender" => $gender,
                "phone_number" => $phone_number,
                "adress" => $adress
            ];

            $patient = new Patient();
            $patient->addPatient($data);


            break;

        //edit a patient 
        case 2:

            printf("Enter ID to Edit :");
            $id = (int)trim(fgets(STDIN));

            $Patient = new Patient();
            $Patient->findByID($id);

            printf("Enter first name :");
            $first_name = trim(fgets(STDIN));

            printf("Enter your last name");
            $last_name = trim(fgets(STDIN));

            printf("Enter your age");
            $age = trim(fgets(STDIN));

            printf("Enter your email");
            $email = trim(fgets(STDIN));

            printf("Enter your phone number");
            $phone_number = trim(fgets(STDIN));

            printf("Enter your gender (male or female)");
            $gender = trim(fgets(STDIN));

            printf("Enter your adress");
            $adress = trim(fgets(STDIN));

            $data = [
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "age" => (int)$age,
                "email" => $email,
                "gender" => $gender,
                "phone_number" => $phone_number,
                "adress" => $adress
            ];

            $patient = new Patient();
            $patient->editPatient($data);
            break;


        case 3:
            /// delete 
            printf("Enter ID to delete :");
            $id = trim(fgets(STDIN));

            $Patient = new Patient();
            echo $Patient->findByID($id);

            $patient = new Patient();
            $patient->deletePatient($id);
            break;
        
        case 4 : 
            $patient = new Patient();
            $patient->displayAllPatients();
            break;
        
        case 5 :
             include "./navigation/menu.php" ;
             break;
        default : echo "ivalid choice ";
    }
} while ((int)$patientChoice <= 5);
