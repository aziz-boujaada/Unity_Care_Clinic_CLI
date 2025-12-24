<?php
echo "
 =============== UNITY CARE CLI ==================  
1-gestion des patients 
2-gestion des doctors 
3-gestion des departements
4-les statistiques
5-quite le programme 
_________________________________________________
";


do {
    printf("enter your choice :");
    $choice = trim(fgets(STDIN));
echo "_________________________________________________" . "\n";
    switch ($choice) {
        case 1:
            include "patientMenu.php";
            break;
        case 2:
            include "doctorsMenu.php";
            break;
        case 3 : 
            include "departementsMenu.php";
            break ;
        case 4 :
            include "statistoiques.php" ;
            break;
        case 5 :
            echo "le programme quitter ";
            break;
        default : echo "invalid choice";       
    }
} while ($choice !== 5);
