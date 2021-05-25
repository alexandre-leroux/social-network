<?php
session_start();
require_once('../model/database.php');

// $requete = $bdd->prepare('SELECT * FROM users WHERE prenom = ?');
// $requete->execute([$_POST['pseudo']]);
// $user = $requete->fetch();
// var_dump($user);
// echo json_encode($user);


//  $id_user_selectionne = $user['id'];
 $id_moi = $_SESSION['id'];
// var_dump($id_user_selectionne);

// $recherche_discussion = $bdd->prepare('SELECT  fk_id_auteur_message FROM chat_prive 
//                                         WHERE  (fk_id_user_1 = ?  OR  fk_id_user_2 = ?) AND fk_id_auteur_message != ? AND non_lu = 1  ');

$recherche_discussion = $bdd->prepare('SELECT  non_lu, fk_id_auteur_message FROM chat_prive 
                                        WHERE  (fk_id_user_1 = ?  OR  fk_id_user_2 = ?) AND fk_id_auteur_message != ? ');
                                     

$recherche_discussion->execute(array($id_moi, $id_moi, $id_moi ));   

$resultat_message_non_lu = $recherche_discussion->fetchAll();



echo json_encode($resultat_message_non_lu);


// var_dump($resultat_message_non_lu); 
// echo json_encode($resultat_message);                         



// echo json_encode(array('data1' => $user, 'data2' => $resultat_message));


