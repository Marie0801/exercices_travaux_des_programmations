<?php
class Employer
{
    
    private $nom;
    private $prenom;
    private $salaire;

    public function __construct($nom, $prenom, $salaire)
    {
        
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->salaire = $salaire;
        
    }

    public function creerEmployer()

    {
        global $db;
        $resultat = false;
        
        $nom = $this->nom;
        $prenom = $this->prenom;
        $salaire = $this->salaire;

        
        $requete = 'INSERT INTO employer (nom, prenom, salaire) VALUES (:nom, :prenom, :salaire)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':salaire'=> $salaire
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    static function getEmployerById($numEmployer)
    {
        global $db;
        $requete = 'SELECT * FROM employer WHERE numEmployer = :numEmployer';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numEmployer' => $numEmployer
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $employer = new Employer ($data['nom'], $data['prenom'], $data['salaire']);
                return $employer;
            } else return null;
        } else return null;
    }


    public function getNumEmployer(){
        global $db;
        $requete = 'SELECT numEmployer FROM employer WHERE nom = :nom AND  prenom = :prenom';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':nom' => $this->getNom(),
                ':prenom' => $this->getPrenom()
                
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numEmployer = $data['numEmployer'];
                return $numEmployer;
            } else return null;
        } else return null;
    }

    static function getEmployers(){
        global $db;
        $requete = 'SELECT * FROM employer WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $employers = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $employer = new Employer ($data['nom'], $data['prenom'], $data['salaire']);
                array_push($employers,$employer);
            }return $employers;
        
        } else return [];
    }
    // public function getSalaireMaximal() {
    //     global $db; // Assurez-vous que $db pointe vers votre connexion à la base de données

    //     $requete = 'SELECT MAX(salaire) AS salaire FROM employer';
    //     $statement = $db->prepare($requete);
    //     $execution = $statement->execute();

    //     if ($execution) {
    //         if ($data = $statement->fetch()) {
    //             $salaireMaximal = [];
    //             $salaireMaximal = $data['salaire'];
    //             echo "Le salaire maximal est : " . $salaireMaximal;
    //         } else {
    //             echo "Aucun résultat trouvé.";
    //         }
    //     } else {
    //         echo "Erreur lors de l'exécution de la requête.";
    //     }
    // }

    // public function getSalaireMinimal() {
    //     global $db; // Assurez-vous que $db pointe vers votre connexion à la base de données

    //     $requete = 'SELECT MIN(salaire) AS salaire FROM employer';
    //     $statement = $db->prepare($requete);
    //     $execution = $statement->execute();

    //     if ($execution) {
    //         if ($data = $statement->fetch()) {
    //             $salaireMinimal = $data['salaire'];
    //             echo "Le salaire minimal est : " . $salaireMinimal;
    //         } else {
    //             echo "Aucun résultat trouvé.";
    //         }
    //     } else {
    //         echo "Erreur lors de l'exécution de la requête.";
    //     }
    // }

    // Autres méthodes de votre classe...


    // Autres méthodes de votre classe...


    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getSalaire()
    {
        return $this->salaire;
    }
    
    /**
     * Set the value of TypeAppart
     *
     * @return  self
     */
    
}
?>