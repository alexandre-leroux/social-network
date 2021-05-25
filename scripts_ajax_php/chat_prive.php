<?php
session_start();
require_once('../model/database.php');

$requete = $bdd->prepare('SELECT * FROM users WHERE prenom = ?');
$requete->execute([$_POST['pseudo']]);
$user = $requete->fetch();
// var_dump($user);
// echo json_encode($user);


 $id_user_selectionne = $user['id'];
 $id_moi = $_SESSION['id'];
// var_dump($id_user_selectionne);

$recherche_discussion = $bdd->prepare('SELECT * FROM chat_prive 
                                        WHERE ( fk_id_user_1 = ?
                                        AND fk_id_user_2 = ? )
                                        OR  (fk_id_user_1 = ?
                                        AND  fk_id_user_2 = ?)
                                         ');
$recherche_discussion->execute(array($id_moi, $id_user_selectionne , $id_user_selectionne, $id_moi));     
$resultat_message = $recherche_discussion->fetchAll();
// var_dump($resultat_message); 
// echo json_encode($resultat_message);                         



echo json_encode(array('data1' => $user, 'data2' => $resultat_message));


