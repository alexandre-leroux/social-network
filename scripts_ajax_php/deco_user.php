<?php
session_start();
require_once('../pages/database.php');


$mail = $_SESSION['mail'];
var_dump($mail);
var_dump($bdd);
$deco = $bdd->prepare('UPDATE users SET connecte = 0 WHERE mail = :mail');
$deco->execute(array('mail' => $mail));
