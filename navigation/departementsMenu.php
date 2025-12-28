<?php
include "./management/departements.php";

do {
    echo "
     =============== GESTION DES DEPARTEMENTS ==================  
    1-Ajouter un nouveau departement
    2-modifier departement 
    3-supprimer departement
    4-afficher tout les departements
    5-retourner au menu principal
    _________________________________________________
    ";

    printf("Enter votre choix : ");
    $departmentChoice = trim(fgets(STDIN));

    switch ($departmentChoice) {
        case 1:
            printf("Enter departement name : ");
            $departement_name = trim(fgets(STDIN));

            printf("Enter departement location : ");
            $departement_location = trim(fgets(STDIN));

            $data = [
                "departement_name" => $departement_name,
                "departement_location" => $departement_location
            ];

            $department = new Departement();
            $department->addDeprtement($data);
            break;

        case 2:
            printf("Enter departement ID to edit : ");
            $id = (int)trim(fgets(STDIN));

            $department = new Departement();
            $department->findByID($id);

            printf("Enter new departement name : ");
            $departement_name = trim(fgets(STDIN));

            printf("Enter new departement location : ");
            $departement_location = trim(fgets(STDIN));

            $data = [
                "departement_id" => $id,
                "departement_name" => $departement_name,
                "departement_location" => $departement_location
            ];

            $department = new Departement();
            $department->editDepartement($data);
            break;

        case 3:
            printf("Enter departement ID to delete : ");
            $id = trim(fgets(STDIN));

            $department = new Departement();
            echo $department->findByID($id);

            $department->deleteDepartment($id);
            break;

        case 4:
            $department = new Departement();
            $department->displayAllDepartements();
            break;

        case 5:
            include "./navigation/menu.php";  
            break;

        default:
            echo "Invalid choice\n";
    }
} while ((int)$departmentChoice <= 5);
?>
