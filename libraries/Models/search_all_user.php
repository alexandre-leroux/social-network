<?php
// session_start();
require_once('database.php');


// $mail = $_SESSION['mail'];

$query = $bdd->query('SELECT * FROM  users ');
$all_users = $query->fetchall();
echo json_encode($all_users);