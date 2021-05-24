<?php

require_once('../model/database.php');

$prenom = htmlspecialchars($_POST['prenom']) ;
$nom = htmlspecialchars($_POST['nom']) ;
$mail = htmlspecialchars($_POST['mail']) ;
$mdp = htmlspecialchars($_POST['mdp']) ; 
$avatar = $_FILES['avatar'] ; 
$confirm_mdp = htmlspecialchars($_POST['confirm_mdp']); 
$hobbies = htmlspecialchars($_POST['hobbies']) ;

// var_dump($hobbies) ;

$connecte = 0;
$id_user = 1; 

$message = array() ; 

if(!empty($prenom) && !empty($nom) && !empty($mail) && !empty($avatar) && !empty($mdp) && !empty($confirm_mdp))
{
    if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$mdp))
    {
        if(preg_match('#[a-z,A-Z,0-9]@laplateforme.io$#',$mail))
        {
            if($mdp === $confirm_mdp)
            {
                $tailleMax = 2097152; 
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                if($_FILES['avatar']['size'] <= $tailleMax)
                {
                     $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
                     if(in_array($extensionUpload, $extensionsValides))
                     {
                         $chemin = "../img/".$id_user.".".$extensionUpload;
                         $mouvement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin ); 
                         if($mouvement)
                         {
                            $requete = $bdd->prepare("INSERT INTO users(prenom,nom,mdp,mail,avatar,hobbies,connecte) 
                                VALUES (:prenom,:nom,:mdp,:mail,:avatar,:hobbies,:connecte)"); 
    
                                $requete->bindParam(':prenom', $prenom);
                                $requete->bindParam(':nom', $nom);
                                $requete->bindParam(':mdp', $mdp);
                                $requete->bindParam(':mail', $mail);
                                $requete->bindParam(':avatar', $chemin);
                                $requete->bindParam(':hobbies', $hobbies);
                                $requete->bindParam(':connecte', $connecte);
    
                                $requete->execute();
    
                                $message['message'] = '<p class="msg_inscription success">Inscription réussi ! Vous allez etre rediriger vers la page de connexion.</p>' ;
                         }
                         else{
                            $message['message'] = '<p class="msg_inscription error">Erreur durant l\'importation du fichier</p>'; 
                        }
                     }
                     else{
                        $message['message'] = '<p class="msg_inscription error">Votre image doit etre au format jpg, jpeg, gif ou png</p>' ;
                     }
                }
                else{
                    $message['message'] = '<p class="msg_inscription error">L\'image ne dois pas dépasser 2mo</p>' ; 
                }
            }
            else{
                $message['message'] = '<p class="msg_inscription error">Les mots de passe sont différents</p>' ; 
            }
        }
        else{
            $message['message'] = '<p class="msg_inscription error">Le mail doit se terminer par la @plateforme.io</p>' ; 
        }
    }
    else{
        $message['message'] = '<p class="msg_inscription error">Le mot de passe ne remplie pas toutes les conditions</p>' ;
    }

}
else{
    $message['message'] = '<p class="msg_inscription error">Veuillez remplir tous les champs</p>' ; 
}

echo json_encode($message) ; 