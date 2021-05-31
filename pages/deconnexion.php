<?php 
session_start();
// var_dump($_SESSION);
require_once("../libraries/autoload.php");

$deco = new \Models\Deconnexion();
$deco->deco($mon_id);