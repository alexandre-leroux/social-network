<?php
session_start();
require_once("../libraries/autoload.php");

$id_moi = $_SESSION['id'];
$nom_groupe = $_POST['groupe'];

$groupe = new \Models\Chat();
$result = $groupe->update_message_groupe_lu($id_moi, $nom_groupe);

