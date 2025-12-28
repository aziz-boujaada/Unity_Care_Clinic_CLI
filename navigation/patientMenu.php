<?php
include "./management/patient.php";
include "./validation/Validator.php";
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
            do {
                printf("Enter first name :");
                $first_name = trim(fgets(STDIN));
                $isValid = Validator::nameValidation($first_name);
            } while (!$isValid);

            do {
                printf("Enter your last name");
                $last_name = trim(fgets(STDIN));
                $isValid = Validator::nameValidation($last_name);
            } while (!$isValid);

            do {
                printf("Enter your age");
                $age = trim(fgets(STDIN));
                $isValid = Validator::ageValidation($age);
            } while (!$isValid);

            do {
                printf("Enter your email");
                $email = trim(fgets(STDIN));
                $isValid =  Validator::emailValidation($email);
            } while (!$isValid);


            do {
                printf("Enter your phone number");
                $phone_number = trim(fgets(STDIN));
                $isValid = Validator::phoneValidation($phone_number);
            } while (!$isValid);

            do {
                printf("Enter your gender (male or female)");
                $gender = trim(fgets(STDIN));
                $isValid = Validator::genderValidation($gender);
            } while (!$isValid);
            do {
                printf("Enter your adress");
                $adress = trim(fgets(STDIN));
            } while (empty($adress));

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

            do {
                printf("Enter first name :");
                $first_name = trim(fgets(STDIN));
                $isValid = Validator::nameValidation($first_name);
            } while (!$isValid);

            do {
                printf("Enter your last name");
                $last_name = trim(fgets(STDIN));
                $isValid = Validator::nameValidation($last_name);
            } while (!$isValid);

            do {
                printf("Enter your email");
                $email = trim(fgets(STDIN));
                $isValid =  Validator::emailValidation($email);
            } while (!$isValid);


            do {
                printf("Enter your phone number");
                $phone_number = trim(fgets(STDIN));
                $isValid = Validator::phoneValidation($phone_number);
            } while (!$isValid);

            do {
                printf("Enter your age");
                $age = trim(fgets(STDIN));
                $isValid = Validator::ageValidation($age);
            } while (!$isValid);


            do {
                printf("Enter your gender (male or female)");
                $gender = trim(fgets(STDIN));
                $isValid = Validator::genderValidation($gender);
            } while (!$isValid);
            do {
                printf("Enter your adress");
                $adress = trim(fgets(STDIN));
            } while (empty($adress));

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

        case 4:
            $patient = new Patient();
            $patient->displayAllPatients();
            break;

        case 5:
            include "./navigation/menu.php";
            break;
        default:
            echo "ivalid choice ";
    }
} while ((int)$patientChoice <= 5);
