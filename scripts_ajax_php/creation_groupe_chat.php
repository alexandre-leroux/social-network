<?php
session_start();
require_once('../model/database.php');


// var_dump($_POST['donnees']);
// var_dump($_POST['nom_groupe']);


$nom_groupe = htmlspecialchars($_POST['nom_groupe']);

// $id_moi = $_SESSION['id'];
// $message = $_POST['message'];
// $prenom_user = $_POST['destinataire'];
// $today = date("Y-m-d H:i:s");
// $non_lu = 1;

// $requete = $bdd->query("SELECT id FROM users WHERE prenom = '".$prenom_user."'");
// $nouveau_groupe= $requete->fetch();

// var_dump($nouveau_groupe);




$req = $bdd->prepare('INSERT INTO groupe (nom_du_groupe) 
                        VALUES (:nom_groupe) ');
$req->bindParam(':nom_groupe', $nom_groupe);

$req->execute();

$requete = $bdd->query("SELECT id FROM groupe WHERE nom_du_groupe = '".$nom_groupe."'");
$id_groupe = $requete->fetch();
var_dump($id_groupe);

foreach($_POST['donnees'] as $key => $value)
{
    $requete = $bdd->query("SELECT id FROM users WHERE prenom = '".$value."'");
    $id_user = $requete->fetch();

    var_dump($id_user);

    $req = $bdd->prepare('INSERT INTO users_dans_groupe (id_groupe, id_user) 
                        VALUES (:id_groupe, :id_user ) ');
    $req->bindParam(':id_groupe', $id_groupe[0]);
    $req->bindParam(':id_user', $id_user[0]);

    $req->execute();
}

// $requete = $bdd->query("SELECT id FROM users WHERE prenom = '".$prenom_user."'");
// $nouveau_groupe= $requete->fetch();