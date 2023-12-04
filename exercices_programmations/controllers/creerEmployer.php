<?php

include '../configuration/config.php';
include '../models/employer.php';

$nom= $_POST['nom'];
$prenom = $_POST['prenom'];
$salaire = $_POST['salaire'];


$employer = new Employer ($nom, $prenom, $salaire);
// var_dump($locataire);
if ($employer -> creerEmployer()){
    header("Location:../views/acceuil.php");
}
?>