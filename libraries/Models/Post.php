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

        $connexion = $this->bdd->prepare("SELECT post.id,texte,date_post,avatar,prenom
                                            FROM post
                                                INNER JOIN users
                                                    ON post.users_id = users.id
                                                        ORDER BY date_post DESC
                                                            LIMIT 5                                                                
        "); 

        $connexion->execute(); 
        $result = $connexion->fetchAll();
        
        return $result ; 
    }

    /**
     * Renvoie l'id du dernier post créer 
     *
     * @return array
     */
    public function getLastPostId() : array
    {
        $requete = $this->bdd->prepare("SELECT id FROM post ORDER BY id DESC LIMIT 1"); 
        $requete->execute();
        
        return $requete->fetch(); 
    }

    /**
     * Ajoute en base de données les img lors de la création du post 
     *
     * @param [type] $post_id
     * @param [type] $id_user
     * @param [type] $img_post
     * @return void
     */
    public function addImgPost($post_id, $id_user,$img_post) : void{
        $requete = $this->bdd->prepare("INSERT INTO post_image(post_id,id_user,img_post)
                                            VALUES(:post_id, :id_user, :img_post)
        ") ; 

        $requete->bindParam(':post_id',$post_id) ; 
        $requete->bindParam(':id_user',$id_user) ; 
        $requete->bindParam(':img_post',$img_post) ; 

        $requete->execute(); 
    }

    /**
     * Renvoie un tableau de toutes les images d'un post 
     *
     * @param integer $id
     * @return array
     */
    public function getImgPost(int $id) : array
    {
        $requete = $this->bdd->prepare("SELECT img_post FROM post_image WHERE post_id = :post_id"); 

        $requete->bindParam(':post_id', $id) ; 

        $requete->execute(); 

        return $requete->fetchAll(); 

    }
}