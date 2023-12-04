<?php

include '../configuration/config.php';
include '../models/employer.php';


function getListeEmployer(){

     return Employer :: getEmployers();
}

// function getListeLivresDispo(){
//     return Tarif :: getLivresDispo();
// }
?>