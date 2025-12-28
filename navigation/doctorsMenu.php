<?php
include "./management/doctor.php";

do {
    echo "
     =============== GESTION DES DOCTORS ==================  
    1-Ajouter un nouveau doctor
    2-modifier doctor 
    3-supprimer doctor
    4-afficher tout les doctors
    5-retourner au menu principal
    _________________________________________________
    ";

    printf("Enter votre choix : ");
    $doctorChoice = trim(fgets(STDIN));

    switch ($doctorChoice) {
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
                printf("Enter your email");
                $email = trim(fgets(STDIN));
                $isValid =  Validator::emailValidation($email);
            } while (!$isValid);


            do {
                printf("Enter your phone number");
                $phone_number = trim(fgets(STDIN));
                $isValid = Validator::phoneValidation($phone_number);
            } while (!$isValid);

            printf("Enter specialization : ");
            $specialization = trim(fgets(STDIN));


            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "specialization" => $specialization,
                "phone_number" => $phone_number,
                "email" => $email,
            ];

            $doctor = new Doctor();
            $doctor->addDoctor($data);
            break;

        case 2:
            printf("Enter doctor ID to edit : ");
            $id = (int)trim(fgets(STDIN));

            $doctor = new Doctor();
            $doctor->findByID($id);

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
            
            printf("Enter new specialization : ");
            $specialization = trim(fgets(STDIN));
          

            $data = [
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "specialization" => $specialization,
                "phone_number" => $phone_number,
                "email" => $email,
                
            ];

            $doctor = new Doctor();
            $doctor->editDoctor($data);
            break;

        case 3:
            printf("Enter doctor ID to delete : ");
            $id = trim(fgets(STDIN));

            $doctor = new Doctor();
            echo $doctor->findByID($id);

            $doctor->deleteDoctor($id);
            break;

        case 4:
            $doctor = new Doctor();
            $doctor->displayAllDoctors();
            break;

        case 5:
            include "./navigation/menu.php";  
            break;

        default:
            echo "Invalid choice\n";
    }
} while ((int)$doctorChoice <= 5);
?>
