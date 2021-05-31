<?php

namespace Controllers; 

class User {

    /**
     * Conditions pour l'inscription utilisateur : retourne un fichier json
     *
     * @param [type] $id_user
     * @param [type] $user
     * @return void
     */
    public function verifInscription($id_user, $user, $prenom, $nom,$mail, $mdp, $avatar,$confirm_mdp,$hobbies){
        
        $message = array() ; 

        if(!empty($prenom) && !empty($nom) && !empty($mail) && !empty($avatar) && !empty($mdp) && !empty($confirm_mdp))
        {
            if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['mdp']))
            {
                if(preg_match('#[a-z,A-Z,0-9]@laplateforme.io$#',$_POST['mail']))
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
                                $chemin = $id_user.".".$extensionUpload;
                                $mouvement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin ); 
                                if($mouvement)
                                {
                                    $user->inscriptionUser($chemin); 
            
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

        return json_encode($message) ; 

    }

    public function checkIdUser($user){

        if(!$user->selectLastId())
        {
            return 1 ; 
        }
        else{
            $result = $user->selectLastId(); 

            $last_id = intval($result) + 1; 

            return $last_id; 
        }
    }


    /**
     * Conditions pour la connexion : renvoie le msg en fichier json 
     *
     * @param [type] $user
     * @return void
     */
    public function verifConnexion($user, $mail, $mdp){

        
        $message = array();

        if(!empty($mail) && !empty($mdp))
        {
            $resultat_users = $user->connexionUser() ;
            
            if($resultat_users)
            {
                $_SESSION['mail'] = $resultat_users['mail'] ;
                $_SESSION['prenom'] = $resultat_users['prenom'] ; 
                $_SESSION['id'] = $resultat_users['id'] ; 

                $user->updateConnecte($mail); 

                $message['message'] = '<p class="msg_inscription success">Connexion réussi ! Vous allez etre redirigé vers la page d\'accueil</p>' ; 
            }
            else {
                $message['message'] = '<p class="msg_inscription error"> Login ou password incorrect. </p>' ; 
            }
            
        }
        else{
            $message['message'] = '<p class="msg_inscription error"> Veuillez remplir tous les champs </p>' ; 
        }

        return json_encode($message) ; 
    }

    
}