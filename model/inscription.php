<?php

require_once('database.php');

var_dump($bdd);
var_dump($_POST);

   

    $prenom = htmlspecialchars($_POST['prenom']) ;
    $mail = htmlspecialchars($_POST['mail']) ;
    $connecte = 0;

    $requete = $bdd->prepare("INSERT INTO users(prenom,mail,connecte) 
    VALUES (:prenom,:mail,:connecte)"); 

    $requete->bindParam(':prenom', $prenom);
    $requete->bindParam(':mail', $mail);
    $requete->bindParam(':connecte', $connecte);

    $requete->execute();



header('location:connexion.php');

