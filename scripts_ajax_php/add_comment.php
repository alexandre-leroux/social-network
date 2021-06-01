<?php

session_start(); 

use Models\Comment;

require_once('../libraries/autoload.php') ; 

$commmentaire = new \Models\Comment(); 

$post_id = 1 ;
$description = $_POST['description'] ; 
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d H:i:s');

$commmentaire->insertComment($post_id,$description,$date); 

echo json_encode($_SESSION) ; 

