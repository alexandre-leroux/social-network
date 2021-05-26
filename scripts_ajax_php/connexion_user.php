<?php
session_start();

require_once("../libraries/autoload.php");

$mail = htmlspecialchars($_POST['mail']) ;
$mdp = htmlspecialchars($_POST['mdp']); 

$user = new \Models\User(NULL,NULL,$mdp,$mail,NULL,NULL,NULL) ; 
$controller = new \Controllers\User(); 

$result = $controller->verifConnexion($user, $mail, $mdp) ; 

echo $result ; // Format JSON 


