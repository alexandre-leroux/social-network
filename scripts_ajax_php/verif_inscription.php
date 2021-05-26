<?php

require_once("../libraries/autoload.php");

$prenom = htmlspecialchars($_POST['prenom']) ;
$nom = htmlspecialchars($_POST['nom']) ;
$mail = htmlspecialchars($_POST['mail']) ;
$mdp = htmlspecialchars($_POST['mdp']) ; 
$avatar = $_FILES['avatar'] ; 
$confirm_mdp = htmlspecialchars($_POST['confirm_mdp']); 
$hobbies = htmlspecialchars($_POST['hobbies']) ;

$connecte = 0;
$id_user = 1; 

$user = new \Models\User($prenom,$nom,$mdp,$mail,NULL,$hobbies,$connecte); 
$controller = new \Controllers\User(); 
// var_dump($hobbies) ;


$result = $controller->verifInscription($id_user, $user,$prenom,$nom,$mail,$mdp,$avatar,$confirm_mdp,$hobbies) ; 
echo $result ; 

