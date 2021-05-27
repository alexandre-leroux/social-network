<?php
session_start();
require_once('database.php');

$mon_id = $_SESSION['id'];
// $mail = $_SESSION['mail'];

$query = $bdd->query("SELECT * FROM  users WHERE id != ".$mon_id."");
$all_users = $query->fetchall();
echo json_encode($all_users);