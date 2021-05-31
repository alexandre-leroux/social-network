<?php
session_start();
require_once("../libraries/autoload.php");

$id_moi = $_SESSION['id'];
$prenom_user = $_POST['pseudo'];

$groupe = new \Models\Chat();
$result = $groupe->update_message_lu($id_moi, $prenom_user);

