<?php
// session_start();
require_once('database.php');


$mon_id = $_SESSION['id'];

$query = $bdd->query("SELECT nom_du_groupe FROM groupe INNER JOIN users_dans_groupe ON groupe.id = users_dans_groupe.id_groupe where id_user = ".$mon_id."");
$groupe = $query->fetchall();

$groupe_json = $groupe;
json_encode($groupe_json);

