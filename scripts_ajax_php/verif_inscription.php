<?php

if(isset($_POST['mail']))
{
    $mail = $_POST['mail'] ; 
    
    $result = array() ; 
    
    if(preg_match('#@laplateforme.io$#', $mail)){
        $result['message'] = 'c\'est good' ; 
    }
    else {
        $result['message'] = 'nope' ; 
    }
    
    echo json_encode($result) ; 
}
if(isset($_POST['mdp']))
{
    $mdp = $_POST['mdp'] ; 
}
