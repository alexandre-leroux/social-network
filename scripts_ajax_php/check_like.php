<?php 

session_start();

require_once("../libraries/autoload.php");

$like = new \Models\Like() ; 

$post_id = $_POST['post_id']  ;

$resultat = $like->checkLike($post_id,$_SESSION['id']) ;

$message = array() ; 

if($resultat['COUNT(id_post)'] == 1)
{
    $message['msg'] = "true" ; 
}
else {
    $message['msg'] = "false" ; 
}

echo json_encode($message) ; 
