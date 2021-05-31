<?php
session_start();
require_once("../libraries/autoload.php");


$nom_du_groupe = $_POST['nom_du_groupe'];

$groupe = new \Models\Chat();
$result = $groupe->messages_chat_groupe($nom_du_groupe);

