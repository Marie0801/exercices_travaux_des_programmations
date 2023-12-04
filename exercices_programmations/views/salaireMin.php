<?php
include_once '../configuration/config.php';
include_once '../models/employer.php';

// Récupérer les données des employés à partir de la fonction getEmployes()
function getListeEmployer(){
    return Employer::getEmployers();
}

$employes = getListeEmployer();

// Vérifier si $employes est un tableau valide avant de chercher le salaire minimum
if (is_array($employes) && count($employes) > 0) {
    // Initialisation du tableau contenant les salaires
    $salaires = array();

    // Parcourir les données des employés pour extraire la colonne des salaires
    foreach ($employes as $employe) {
        // Ajouter chaque salaire au tableau $salaires
        $salaires[] = $employe->getSalaire();
    }

    // Trouver le salaire minimum dans le tableau $salaires
    $salaireMin = min($salaires);

    // Affichage du salaire minimum
    echo "Le salaire minimum enregistré est : $salaireMin";
} else {
    echo "Aucune donnée d'employé trouvée ou problème avec les données d'employé.";
}
?>
