<?php
session_start();
require_once('../model/database.php');

$id_moi = $_SESSION['id'];
$message = $_POST['message'];
$prenom_user = $_POST['destinataire'];
$today = date("Y-m-d H:i:s");
$non_lu = 1;

$requete = $bdd->query("SELECT id FROM users WHERE prenom = '".$prenom_user."'");
$id_user= $requete->fetch();

var_dump($id_user);




$req = $bdd->prepare('INSERT INTO chat_prive (fk_id_user_1, fk_id_user_2, fk_id_auteur_message, message, date, non_lu) 
                        VALUES (:fk_id_user_1, :fk_id_user_2, :fk_id_auteur_message, :message, :date, :non_lu) ');
$req->bindParam(':fk_id_user_1', $id_moi);
$req->bindParam(':fk_id_user_2', $id_user[0]);
$req->bindParam(':fk_id_auteur_message', $id_moi);
$req->bindParam(':message', $message);
$req->bindParam(':date', $today);
$req->bindParam(':non_lu', $non_lu);
$req->execute();