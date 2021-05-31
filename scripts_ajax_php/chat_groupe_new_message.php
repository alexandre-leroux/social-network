<?php
session_start();
require_once('../model/database.php');
$id_moi = $_SESSION['id'];


$req = $bdd->query("SELECT *, nom_du_groupe FROM users_dans_groupe INNER JOIN groupe ON groupe.id = users_dans_groupe.id_groupe   WHERE id_user = ".$id_moi."");
$resultat = $req->fetchall();

echo json_encode($resultat);
// var_dump($resultat);