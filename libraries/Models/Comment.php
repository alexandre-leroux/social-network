<?php

namespace Models ;

require_once("Model.php") ; 

class Comment extends Model {

    public function insertComment($post_id,$description,$date){

        $connexion = $this->bdd->prepare("INSERT INTO comment(post_id, user_id, comment, date_comment)
                                            VALUES(:post_id, :user_id, :comment, :date_comment)
        "); 

        $connexion->bindParam(':post_id' , $post_id) ; 
        $connexion->bindParam(':user_id' , $_SESSION['id']); 
        $connexion->bindParam(':comment' , $description) ;
        $connexion->bindParam(':date_comment' , $date) ;

        $connexion->execute() ; 
    }

    public function getComment(?string $order){

        $sql = "SELECT * FROM comment WHERE post_id = :post_id" ;
                
        if($order){
            $sql .= $order;
        }

        $requete = $this->bdd->prepare($sql); 

        $requete->bindParam(':post_id' , $post_id); 

        $requete->execute(); 

        $result = $requete->fetchAll(); 

        return $result ; 

    }

}