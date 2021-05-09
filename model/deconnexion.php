<?php
session_start();
require_once('database.php');

$mail = $_SESSION['mail']  ;
$connexion = $bdd->prepare('UPDATE users SET connecte = 0 WHERE mail = :mail');
$connexion->execute(array('mail' => $mail));

session_destroy ( );

header('location:../index.php');