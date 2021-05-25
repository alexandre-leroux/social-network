<?php
session_start();
require_once('../model/database.php');

$mail = htmlspecialchars($_POST['mail']) ;
$mdp = htmlspecialchars($_POST['mdp']); 

$message = array(); 

if(!empty($mail) && !empty($mdp))
{
    $connexion = $bdd->prepare('SELECT * FROM users 
                                    WHERE mail = :mail
                                        AND mdp = :mdp');
    
    $connexion->bindParam(':mail', $mail);
    $connexion->bindParam(':mdp', $mdp);
    
    $connexion->execute(); 
    
    $resultat_users = $connexion->fetch();
    
    if($resultat_users)
    {
        $_SESSION['mail'] = $resultat_users['mail'] ;
        $_SESSION['prenom'] = $resultat_users['prenom'] ; 
        $_SESSION['id'] = $resultat_users['id'] ; 

        $deco = $bdd->prepare('UPDATE users SET connecte = 1 WHERE mail = :mail');
        $deco->execute(array('mail' => $mail));

        $message['message'] = '<p class="msg_inscription success">Connexion réussi ! Vous allez etre redirigé vers la page d\'accueil</p>' ; 
    }
    else {
        $message['message'] = '<p class="msg_inscription error"> Login ou password incorrect. </p>' ; 
    }
    
}
else{
    $message['message'] = '<p class="msg_inscription error"> Veuillez remplir tous les champs </p>' ; 
}

echo json_encode($message) ; 


