<?php

session_start();
require_once("../libraries/autoload.php");

$post_id = $_POST['id'] ; 

$comment = new \Models\Comment() ; 
$display = new \Vue\Comment() ; 

$result = $comment->getComment(" ORDER BY date_comment DESC", $post_id) ; 

// $resultat = $comment->getComment(" ORDER BY date_comment DESC LIMIT 1" , $post_id) ; 

$display->displayLastComment($result) ; 

