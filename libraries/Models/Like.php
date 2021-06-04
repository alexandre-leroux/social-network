<?php

namespace Models ;

require_once("Model.php") ; 

class Like extends Model {

    public function insertLike($post){

        $requete = $this->bdd->prepare("INSERT INTO aime (id_post, id_user)
                                            VALUE (:id_post, :id_user)
        ") ;

        $requete->bindParam(':id_post', $post) ; 
        $requete->bindParam(':id_user', $_SESSION['id']) ;

        $requete->execute() ; 
        
    }

    public function deleteLike($post) { 

        $requete = $this->bdd->prepare("DELETE FROM aime 
            WHERE id_post = :id_post
                AND id_user = :id_user
        ") ;    

        $requete->bindParam(':id_post', $post) ; 
        $requete->bindParam(':id_user', $_SESSION['id']) ;

        $requete->execute(); 

    }

    public function checkLike($post_id){

        $requete = $this->bdd->prepare("SELECT COUNT(id_post) 
                                            FROM aime
                                                WHERE id_post = :id_post
        ");

        $requete->bindParam(':id_post', $post_id) ; 
        $requete->execute() ; 

        $result = $requete->fetch() ; 

        return $result ; 


    }
}
