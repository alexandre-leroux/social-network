<?php
session_start();
require_once('../model/database.php');

$nom_du_groupe = $_POST['nom_du_groupe'];

// $req1 = $bdd->query("SELECT id FROM groupe WHERE nom_du_groupe = '".$nom_du_groupe."'");
// $resultat1 = $req1->fetch();
// var_dump($resultat1);

$req2 = $bdd->query("SELECT * FROM messages_chat_groupe INNER JOIN groupe ON messages_chat_groupe.id_groupe =  groupe.id WHERE nom_du_groupe = '".$nom_du_groupe."'");
$resultat2 = $req2->fetchall();

echo json_encode($resultat2);