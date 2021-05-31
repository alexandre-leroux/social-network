<?php
session_start();
require_once("../libraries/autoload.php");


$id_moi = $_SESSION['id'];
$message = $_POST['message'];
$prenom_user = $_POST['destinataire'];
$today = date("Y-m-d H:i:s");
$non_lu = 1;

$groupe = new \Models\Chat();
$result = $groupe->chat_prive_add_message($id_moi,$message,$prenom_user,$today,$non_lu);
