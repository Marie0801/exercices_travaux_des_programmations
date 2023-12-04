<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>enregister les employers</title>
    <?php include_once "../controllers/getListeEmployer.php"?>
    <?php include_once "../includes/fromwork.php"?>

</head>
<body>


<?php include_once "../includes/header.php"?>
<div class="content">
    <section style="border:1px solid">
    <h3 style="text-align: center; color:rgba(19, 0, 75, 0.952);margin-top:5px"><strong>ENREGISTRER LES EMPLOYER</h3>
    <h5 style="text-align: center;">Entrer les parametres des employers </h5>

    <form action="../controllers/creerEmployer.php" method="POST">
    <section class="row" style="margin: 15px;">
    <div class="col-4"></div>
        <div class="col-4">
<!-- <label class="form-label">Numero</label>
        <input type="number" name=NumLocataire class="form-control" required><br> -->
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" required><br>
        <label class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" required><br>
        
        <label class="form-label">salaire</label>
        <input type="number" class="form-control" name="salaire" required><br>
        

        </section>
        <button type="sumit" value="Envoyer" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto; margin-right:auto;">Enregistrer</button><br>
    </form>
    
        
    <div class="mx-5">
        <div class="text-center">
        <h2>listes des employers</h2>
        </div><br>
        <p style="color: black;">voulez-vous voir le salaire maximale? <a href="salaireMax.php">clicquez ici</a></p>
        <p style="color: black;">voulez-vous voir le salaire minimale? <a href="salaireMin.php"> clicquez ici</a></p>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>NumEmploye</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>salaire</th>

        </tr>
    </thead>
        

        
    

<?php include_once "../includes/fromwork2.php"?>
<?php
// $nom1=$_POST['nom'];
// $prenom1=$_POST['prenom'];
// $salaire1=$_POST['salaire'];

// $_SESSION['nom']=$nom1;
// $_SESSION['prenom']=$prenom1;
// $_SESSION['salaire']=$salaire1;

$employer = getListeEmployer();
        for($i = 0; $i < count($employer); $i++) {
            echo "<tr>";
            echo "<th scope =\"row\">".$employer[$i]->getNumEmployer()."</th>";
            echo "<td>".$employer[$i]->getNom()."</td>";
            echo "<td>".$employer[$i]->getPrenom()."</td>";
            echo "<td>".$employer[$i]->getSalaire()."</td>";
        
        
        }
?>
</table>
</div>
</div>
</body>
</html>