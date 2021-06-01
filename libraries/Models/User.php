<?php

namespace Models ;

require_once("Model.php") ; 

class User extends Model {

    public function __construct($prenom,$nom,$mdp,$mail,$chemin,$hobbies,$connecte)
    {
        $this->prenom = $prenom; 
        $this->nom = $nom; 
        $this->mdp = $mdp; 
        $this->mail = $mail;
        $this->chemin = $chemin; 
        $this->hobbies = $hobbies; 
        $this->connecte = $connecte; 
        parent::__construct();
    }
    public function inscriptionUser($chemin)
    {

        $requete = $this->bdd->prepare('INSERT INTO users(prenom,nom,mdp,mail,avatar,hobbies,connecte) 
        VALUES (:prenom,:nom,:mdp,:mail,:avatar,:hobbies,:connecte)'); 

        $requete->bindParam(':prenom', $this->prenom);
        $requete->bindParam(':nom', $this->nom);
        $requete->bindParam(':mdp', $this->mdp);
        $requete->bindParam(':mail', $this->mail);
        $requete->bindValue(':avatar', $chemin);
        $requete->bindParam(':hobbies', $this->hobbies);
        $requete->bindParam(':connecte', $this->connecte);

        $requete->execute();
    }

    public function connexionUser(){

        $connexion = $this->bdd->prepare('SELECT * FROM users 
                                    WHERE mail = :mail
                                        AND mdp = :mdp');
        
        $connexion->bindParam(':mail', $this->mail);
        $connexion->bindParam(':mdp', $this->mdp);
        
        $connexion->execute(); 
        
        $resultat_users = $connexion->fetch();

        return $resultat_users; 
    }

        /**
     * Passer à 1 le connecte de l'utilisateur en bdd 
     *
     * @param string $mail
     * @return void
     */
    public function updateConnecte($mail)
    {
        $deco = $this->bdd->prepare('UPDATE users SET connecte = 1 WHERE mail = :mail');
        $deco->execute(array('mail' => $mail));
    }

    public function selectLastId(){

        $requete = $this->bdd->prepare("SELECT id FROM users ORDER BY id DESC LIMIT 1");

        $requete->execute() ;

        $result = $requete->fetch(); 

        return $result; 
    }

    public function updateDeconnecteChat($mail)
    {
        $deco = $this->bdd->prepare('UPDATE users SET connecte = 0 WHERE mail = :mail');
        $deco->execute(array('mail' => $mail));
    }



}
