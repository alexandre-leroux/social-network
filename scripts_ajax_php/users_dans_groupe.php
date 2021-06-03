<?php
session_start();
require_once("../libraries/autoload.php");


$nom_du_groupe = $_POST['nom_du_groupe'];

$groupe = new \Models\Chat();
$result = $groupe->users_dans_groupe($nom_du_groupe);

