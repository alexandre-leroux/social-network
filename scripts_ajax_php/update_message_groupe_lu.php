<?php
session_start();
require_once('../model/database.php');
$id_moi = $_SESSION['id'];

$nom_groupe = $_POST['groupe'];

$req = $bdd->prepare('SELECT id FROM groupe WHERE nom_du_groupe = ?');
$req->execute(array($nom_groupe));
$id_groupe = $req->fetch();

var_dump($id_groupe);
var_dump($id_moi);

$requete = $bdd->prepare('UPDATE users_dans_groupe SET new_message = 0
                             WHERE id_groupe = ?
                             AND id_user = ?
                           ');

$requete->execute(array($id_groupe[0], $id_moi));