<?php

namespace Models ;

require_once("Model.php") ; 

class Post extends Model {

    public function addPost($id,$description,$date) {

        $connexion = $this->bdd->prepare("INSERT INTO post (users_id,texte, date_post)
                                                    VALUES(:id_users, :description, :date_post)"
        ); 

        $connexion->bindParam(':id_users' , $id) ; 
        $connexion->bindParam(':description' , $description) ; 
        $connexion->bindParam(':date_post' , $date) ; 
        
        $connexion->execute() ; 

    }

    public function getPost() {

        $connexion = $this->bdd->prepare("SELECT *
                                            FROM post
                                                ORDER BY date DESC
        "); 

        $connexion->execute(); 
        $result = $connexion->fetchAll();
        
        return $result ; 
    }
}