<?php
session_start();
require_once("../libraries/autoload.php");

$motclef = $_POST['motclef'];
$mon_id = $_SESSION['id'];
$groupe = new \Models\Chat();
$result = $groupe->autocompletion($motclef, $mon_id);