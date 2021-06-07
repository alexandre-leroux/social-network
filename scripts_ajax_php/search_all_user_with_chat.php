<?php
session_start();
require_once("../libraries/autoload.php");

$mon_id = $_SESSION['id'];
// var_dump($mon_id);
$groupe = new \Models\Chat();
$result = $groupe->search_all_user_with_what($mon_id);
