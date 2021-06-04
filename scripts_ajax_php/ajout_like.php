<?php 

session_start();

require_once("../libraries/autoload.php");

$like = new \Models\Like() ; 

$post = $_POST['post']  ;

$like->insertLike($post) ;