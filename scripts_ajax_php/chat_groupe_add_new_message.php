<?php

session_start();
require_once('../model/database.php');


$id_moi = $_SESSION['id'];
$message = $_POST['message'];
$nom_groupe = $_POST['destinataire'];
$today = date("Y-m-d H:i:s");
$non_lu = 1;

$requete = $bdd->query("SELECT id FROM groupe WHERE nom_du_groupe = '".$nom_groupe."'");
$nom_du_groupe= $requete->fetch();

var_dump($nom_du_groupe);

$req = $bdd->prepare('INSERT INTO messages_chat_groupe (id_auteur, id_groupe, message) 
                        VALUES (:id_auteur, :id_groupe, :message) ');
$req->bindParam(':id_auteur', $id_moi);
$req->bindParam(':id_groupe', $nom_du_groupe['id']);
$req->bindParam(':message', $message);

$req->execute();


$requete = $bdd->query('UPDATE users_dans_groupe SET new_message = 1 WHERE id_groupe = '.$nom_du_groupe['id'].' AND id_user != '.$id_moi.'');