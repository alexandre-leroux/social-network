<?php

require_once("../libraries/Models/User.php"); 
require_once("../libraries/Controller/User.php");

$prenom = htmlspecialchars($_POST['prenom']) ;
$nom = htmlspecialchars($_POST['nom']) ;
$mail = htmlspecialchars($_POST['mail']) ;
$mdp = htmlspecialchars($_POST['mdp']) ; 
$avatar = $_FILES['avatar'] ; 
$confirm_mdp = htmlspecialchars($_POST['confirm_mdp']); 
$hobbies = htmlspecialchars($_POST['hobbies']) ;

$user = new \Models\User($prenom,$nom,$mail,$mdp,$avatar,$confirm_mdp,$hobbies); 
$controller = new \Controllers\User(); 
// var_dump($hobbies) ;

$connecte = 0;
$id_user = 1; 

$result = $controller->verifInscription($id_user, $user) ; 
echo $result ; 

