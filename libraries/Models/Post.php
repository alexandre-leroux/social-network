<?php

namespace Models ;

require_once("Model.php") ; 

class Post extends Model {

    public function addPost() {

        $connexion = $this->bdd->prepare("INSERT INTO post (id_users,description, date_post)
                                                    VALUES(:id_users, :description, :date_post"
        ); 

        $connexion->bindParam(':id_users' , $_SESSION['id']) ; 
        $connexion->bindParam(':description' , $description) ; 
        $connexion->bindParam(':date_post' , $date) ; 
        
        $connexion->execute() ; 

    }
}