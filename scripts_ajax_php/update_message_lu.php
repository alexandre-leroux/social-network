<?php
session_start();
require_once('../model/database.php');
$id_moi = $_SESSION['id'];

$prenom_user = $_POST['pseudo'];

$req = $bdd->prepare('SELECT id FROM users WHERE prenom = ?');
$req->execute(array($prenom_user));
$id_user = $req->fetch();

var_dump($id_user);
var_dump($id_moi);

$requete = $bdd->prepare('UPDATE chat_prive SET non_lu = 0
                             WHERE (fk_id_user_1 = ?  OR  fk_id_user_2 = ? ) 
                             AND fk_id_auteur_message = ?
                           ');

$requete->execute(array($id_moi, $id_moi, $id_user['id']));


