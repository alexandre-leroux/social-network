<?php
session_start();
require_once("../libraries/autoload.php");


$id_moi = $_SESSION['id'];
$message = $_POST['message'];
$prenom_user = $_POST['destinataire'];
$today = date("Y-m-d H:i:s");
$non_lu = 1;

$groupe = new \Models\Chat();
$result = $groupe->chat_groupe_add_new_message($id_moi,$message,$nom_groupe,$today,$non_lu);
