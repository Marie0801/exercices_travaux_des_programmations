<?php
include_once '../configuration/config.php';
include_once '../models/employer.php';
// include '../controllers/getListeEmployer.php';

// Récupérer les données des employés à partir de la fonction getEmployes()

function getListeEmployer(){

    return Employer :: getEmployers();
}

$employes = getListeEmployer();
// Vérifier si $employes est un tableau valide avant de chercher le salaire maximum
if (is_array($employes) && count($employes) > 0) {
    // Initialisation du tableau contenant les salaires
    $salaires = array();

    // Parcourir les données des employés pour extraire la colonne des salaires
    foreach ($employes as $employe) {
        // Ajouter chaque salaire au tableau $salaires
        $salaires[] = $employe->getSalaire();
    }

    // Trouver le salaire maximum dans le tableau $salaires
    $salaireMax = max($salaires);

    // Affichage du salaire maximum
    echo "Le salaire maximum enregistré est : $salaireMax";
} else {
    echo "Aucune donnée d'employé trouvée ou problème avec les données d'employé.";
}
?>