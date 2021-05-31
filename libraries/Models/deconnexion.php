<?php
// session_start();
namespace Models ;

require_once("Model.php") ; 


class Deconnexion extends Model{


    public function deco(){

        $mail = $_SESSION['mail']  ;
        $connexion = $this->bdd->prepare('UPDATE users SET connecte = 0 WHERE mail = :mail');
        $connexion->execute(array('mail' => $mail));
        
        session_destroy ( );
        
        header('location:../index.php');
    }



}

