<?php

session_start();

require_once('database.php');


$mail = htmlspecialchars($_POST['mail']) ;
$mdp = htmlspecialchars($_POST['mdp']); 

$connexion = $bdd->prepare('SELECT * FROM users 
                                WHERE mail = :mail
                                    AND mdp = :mdp');

$connexion->bindParam(':mail', $mail);
$connexion->bindParam(':mdp', $mdp);

$resultat_users= $connexion->fetch();

var_dump($resultat_users);

// $_SESSION['prenom'] = $resultat_users['prenom'];
// $_SESSION['mail'] = $resultat_users['mail'];

// $connexion = $bdd->prepare('UPDATE users SET connecte = 1 WHERE mail = :mail');
// $connexion->execute(array('mail' => $mail));

// header('location:../index.php');
