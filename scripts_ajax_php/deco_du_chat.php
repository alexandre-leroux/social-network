<?php
session_start();
require_once("../libraries/autoload.php");

$mail = $_SESSION['mail'];

$user = new \Models\User(NULL,NULL,NULL,$mail,NULL,NULL,NULL);
$user->updateDeconnecteChat($mail);