<?php
// session_start();
namespace Models ;

require_once("Model.php") ; 

class Chat extends Model {


    public function display_groupes($mon_id)
    {
        $query = $this->bdd->query("SELECT nom_du_groupe FROM groupe INNER JOIN users_dans_groupe ON groupe.id = users_dans_groupe.id_groupe where id_user = ".$mon_id."");
        $groupe = $query->fetchall();
        // var_dump($groupe);
        
        return $groupe;
        //  return json_encode($groupe_json);

    }

    public function chat_groupe_add_new_message($id_moi,$message,$nom_groupe,$today,$non_lu)
    {
        
        $requete = $bdd->query("SELECT id FROM groupe WHERE nom_du_groupe = '".$nom_groupe."'");
        $nom_du_groupe= $requete->fetch();
        
        var_dump($nom_du_groupe);
        
        $req = $bdd->prepare('INSERT INTO messages_chat_groupe (id_auteur, id_groupe, message) 
                                VALUES (:id_auteur, :id_groupe, :message) ');
        $req->bindParam(':id_auteur', $id_moi);
        $req->bindParam(':id_groupe', $nom_du_groupe['id']);
        $req->bindParam(':message', $message);
        
        $req->execute();
        
        $requete = $bdd->query('UPDATE users_dans_groupe SET new_message = 1 WHERE id_groupe = '.$nom_du_groupe['id'].' AND id_user != '.$id_moi.'');

    }

    public function chat_groupe_new_message($id_moi)
    {
        $req = $bdd->query("SELECT *, nom_du_groupe FROM users_dans_groupe INNER JOIN groupe ON groupe.id = users_dans_groupe.id_groupe   WHERE id_user = ".$id_moi."");
        $resultat = $req->fetchall();

        echo json_encode($resultat);
    }










}
