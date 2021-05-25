<?php

namespace Models ;

require_once("Model.php") ; 

class User extends Model {

    public function construct__($prenom,$nom,$mdp,$mail,$chemin,$hobbies,$connecte)
    {
        $this->prenom = $prenom; 
        $this->$nom = $nom; 
        $this->mdp = $mdp; 
        $this->mail = $mail;
        $this->chemin = $chemin; 
        $this->hobbies = $hobbies; 
        $this->connecte = $connecte; 
    }
    public function inscriptionUser()
    {
        $requete = $this->bdd->prepare("INSERT INTO users(prenom,nom,mdp,mail,avatar,hobbies,connecte) 
        VALUES (:prenom,:nom,:mdp,:mail,:avatar,:hobbies,:connecte)"); 

        $requete->bindParam(':prenom', $this->prenom);
        $requete->bindParam(':nom', $this->nom);
        $requete->bindParam(':mdp', $this->mdp);
        $requete->bindParam(':mail', $this->mail);
        $requete->bindParam(':avatar', $this->chemin);
        $requete->bindParam(':hobbies', $this->hobbies);
        $requete->bindParam(':connecte', $this->connecte);

        $requete->execute();
    }



}
