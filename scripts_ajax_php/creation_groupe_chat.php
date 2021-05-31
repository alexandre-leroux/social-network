<?php
session_start();
require_once("../libraries/autoload.php");

$nom_groupe = htmlspecialchars($_POST['nom_groupe']);
array_push ( $_POST['donnees'] , $_SESSION['prenom'] ) ;

$groupe = new \Models\Chat();
$result = $groupe->creation_groupe_chat($nom_groupe);

