<?php
// session_start();
namespace Models ;

require_once("Model.php") ; 

class Chat extends Model {

    public function search_all_user($mon_id)
        {
            $query = $this->bdd->query("SELECT * FROM  users WHERE id != ".$mon_id."");
            $all_users = $query->fetchall();
            // var_dump($all_users);
            echo json_encode($all_users);
        }

    public function search_all_user_with_what($mon_id)
        {
            $query = $this->bdd->query("SELECT DISTINCT  users.id,users.prenom,users.mail,users.connecte,users.nom,users.avatar,users.hobbies FROM  users INNER JOIN chat_prive 
                                            WHERE (fk_id_user_1 = ".$mon_id." AND chat_prive.fk_id_user_2 = users.id) OR (fk_id_user_2 = ".$mon_id." AND chat_prive.fk_id_user_1 = users.id) ");
            $all_users = $query->fetchall();
            // var_dump($all_users);
            echo json_encode($all_users);
        }

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
            
            $requete = $this->bdd->query("SELECT id FROM groupe WHERE nom_du_groupe = '".$nom_groupe."'");
            $nom_du_groupe= $requete->fetch();
            
            var_dump($nom_du_groupe);
            
            $req = $this->bdd->prepare('INSERT INTO messages_chat_groupe (id_auteur, id_groupe, message) 
                                    VALUES (:id_auteur, :id_groupe, :message) ');
            $req->bindParam(':id_auteur', $id_moi);
            $req->bindParam(':id_groupe', $nom_du_groupe['id']);
            $req->bindParam(':message', $message);
            
            $req->execute();
            
            $requete = $this->bdd->query('UPDATE users_dans_groupe SET new_message = 1 WHERE id_groupe = '.$nom_du_groupe['id'].' AND id_user != '.$id_moi.'');

        }

    public function chat_groupe_new_message($id_moi)
        {
            $req = $this->bdd->query("SELECT *, nom_du_groupe FROM users_dans_groupe INNER JOIN groupe ON groupe.id = users_dans_groupe.id_groupe   WHERE id_user = ".$id_moi."");
            $resultat = $req->fetchall();

            echo json_encode($resultat);
        }

    public function chat_prive_add_message($id_moi,$message,$prenom_user,$today,$non_lu)
        {
            $requete = $this->bdd->query("SELECT id FROM users WHERE prenom = '".$prenom_user."'");
            $id_user= $requete->fetch();

            $req = $this->bdd->prepare('INSERT INTO chat_prive (fk_id_user_1, fk_id_user_2, fk_id_auteur_message, message, date, non_lu) 
                                    VALUES (:fk_id_user_1, :fk_id_user_2, :fk_id_auteur_message, :message, :date, :non_lu) ');
            $req->bindParam(':fk_id_user_1', $id_moi);
            $req->bindParam(':fk_id_user_2', $id_user[0]);
            $req->bindParam(':fk_id_auteur_message', $id_moi);
            $req->bindParam(':message', $message);
            $req->bindParam(':date', $today);
            $req->bindParam(':non_lu', $non_lu);
            $req->execute();
        }

    public function chat_prive_new_message($id_moi)
        {
            $recherche_discussion = $this->bdd->prepare('SELECT  non_lu, fk_id_auteur_message FROM chat_prive 
                                            WHERE  (fk_id_user_1 = ?  OR  fk_id_user_2 = ?) AND fk_id_auteur_message != ? ');
                                        

            $recherche_discussion->execute(array($id_moi, $id_moi, $id_moi ));   

            $resultat_message_non_lu = $recherche_discussion->fetchAll();



            echo json_encode($resultat_message_non_lu);
        }

    public function chat_prive($id_moi, $pseudo)
        {
            $requete = $this->bdd->prepare('SELECT * FROM users WHERE prenom = ?');
            $requete->execute([$pseudo]);
            $user = $requete->fetch();

            $id_user_selectionne = $user['id'];
            
            $recherche_discussion = $this->bdd->prepare('SELECT * FROM chat_prive 
            WHERE ( fk_id_user_1 = ?
            AND fk_id_user_2 = ? )
            OR  (fk_id_user_1 = ?
            AND  fk_id_user_2 = ?)
            ');
            $recherche_discussion->execute(array($id_moi, $id_user_selectionne , $id_user_selectionne, $id_moi));     
            $resultat_message = $recherche_discussion->fetchAll();

            echo json_encode(array('data1' => $user, 'data2' => $resultat_message));

        }

    public function creation_groupe_chat($nom_groupe)
        {
            

            $req = $this->bdd->prepare('INSERT INTO groupe (nom_du_groupe) 
            VALUES (:nom_groupe) ');
            $req->bindParam(':nom_groupe', $nom_groupe);

            $req->execute();

            $requete = $this->bdd->query("SELECT id FROM groupe WHERE nom_du_groupe = '".$nom_groupe."'");
            $id_groupe = $requete->fetch();
            // var_dump($id_groupe);

            foreach($_POST['donnees'] as $key => $value)
            {
            $requete = $this->bdd->query("SELECT id FROM users WHERE prenom = '".$value."'");
            $id_user = $requete->fetch();

            var_dump($id_user);

            $req = $this->bdd->prepare('INSERT INTO users_dans_groupe (id_groupe, id_user, new_message) 
            VALUES (:id_groupe, :id_user, 0 ) ');
            $req->bindParam(':id_groupe', $id_groupe[0]);
            $req->bindParam(':id_user', $id_user[0]);

            $req->execute();
            }
        }

    public function messages_chat_groupe($nom_du_groupe)
        {
            
            $req2 = $this->bdd->query(" SELECT DISTINCT *
                                        FROM messages_chat_groupe 
                                        INNER JOIN groupe ON messages_chat_groupe.id_groupe =  groupe.id 
                                        INNER JOIN users ON messages_chat_groupe.id_auteur = users.id 
                                        WHERE nom_du_groupe = '".$nom_du_groupe."'
            ");
            $resultat2 = $req2->fetchall();

            echo json_encode($resultat2);

        }

    public function users_dans_groupe($nom_du_groupe)
        {
            
            $req2 = $this->bdd->query(" SELECT *
                                        FROM users 
                                        INNER JOIN users_dans_groupe ON users.id = users_dans_groupe.id_user
                                        INNER JOIN groupe ON users_dans_groupe.id_groupe = groupe.id 
                                        WHERE nom_du_groupe = '".$nom_du_groupe."'
            ");
            $resultat2 = $req2->fetchall();

            echo json_encode($resultat2);

        }

    public function update_message_groupe_lu($id_moi, $nom_groupe)
        {
            $req = $this->bdd->prepare('SELECT id FROM groupe WHERE nom_du_groupe = ?');
            $req->execute(array($nom_groupe));
            $id_groupe = $req->fetch();

            var_dump($id_groupe);
            var_dump($id_moi);

            $requete = $this->bdd->prepare('UPDATE users_dans_groupe SET new_message = 0
                                        WHERE id_groupe = ?
                                        AND id_user = ?
                                    ');

            $requete->execute(array($id_groupe[0], $id_moi));
        }
    
    public function update_message_lu($id_moi, $prenom_user )
        {
            $req = $this->bdd->prepare('SELECT id FROM users WHERE prenom = ?');
            $req->execute(array($prenom_user));
            $id_user = $req->fetch();

            var_dump($id_user);
            var_dump($id_moi);

            $requete = $this->bdd->prepare('UPDATE chat_prive SET non_lu = 0
                                        WHERE (fk_id_user_1 = ?  OR  fk_id_user_2 = ? ) 
                                        AND fk_id_auteur_message = ?
                                    ');

            $requete->execute(array($id_moi, $id_moi, $id_user['id']));

        }

    public function autocompletion($motclef,$mon_id ) 
    {
        $motclef_secure = htmlspecialchars($motclef);
        $req_search = $this->bdd->prepare("SELECT * FROM users WHERE prenom  LIKE ? AND id != ?");
        $req_search->execute(array(  "%$motclef_secure%", $mon_id));
        $res = $req_search->fetchAll();
        echo json_encode($res);
    }   


}