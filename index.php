<?php 
session_start();
 
require_once("libraries/autoload_index.php");

if(@$_SESSION['mail'])
{
    $mail = $_SESSION['mail'];
    $user = new \Models\User(NULL,NULL,NULL,$mail,NULL,NULL,NULL);
    $user->updateConnecte($mail);

    $mail = $_SESSION['mail'];
    $mon_id = $_SESSION['id'];

    $post = new \Models\Post(); 
    $groupe = new \Models\Chat();
    $result = $groupe->display_groupes($mon_id);
    $infos_post = $post->getPost(); 
    var_dump($post->getPost()); 

    $vue_post = new \Vue\Post();
}

$vue = new \Vue\Header();

date_default_timezone_set("Europe/Paris"); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>social network</title>
</head>


<body>

<?php
    if(!isset($_SESSION['mail']))
    {
        $vue->header_non_connecte();
    }
    else
    {
        $vue->header_connecte();
    }

    if(isset($_POST['bouton-post']))
    {
        if(isset($_POST['input_text']))
        {
            if(!empty($_POST['input_text'])){

                $post->addPost($_SESSION['id'],$_POST['input_text'], date("Y-m-d H:i:s"));
                $result_id = $post->getLastPostId(); 
                $post_id = $result_id['id'] ; 
                if(isset($_FILES['choix_image']) && $_FILES['choix_image']['name'][0] != "")
                {
                    for($i = 0 ; isset($_FILES['choix_image']['name'][$i]); $i++)
                    {
                        $tailleMax = 2097152; 
                        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                        if($_FILES['choix_image']['size'][$i] <= $tailleMax)
                        {
                            $extensionUpload = strtolower(substr(strrchr($_FILES['choix_image']['name'][$i], '.'),1));
                            if(in_array($extensionUpload, $extensionsValides))
                            {
                                $chemin = "img/img_post/".$post_id."-".$i.".".$extensionUpload;
                                $mouvement = move_uploaded_file($_FILES['choix_image']['tmp_name'][$i], $chemin );
                                $img_post =  $post_id."-".$i.".".$extensionUpload ; 
                                if($mouvement)
                                {
                                    $post->addImgPost($post_id, $_SESSION['id'],$img_post) ;
            
                                    echo 'ok' ;
                                }
                                else{
                                    echo '<p class="msg_inscription error">Erreur durant l\'importation du fichier</p>'; 
                                }
                            }
                            else{
                                echo '<p class="msg_inscription error">Votre image doit etre au format jpg, jpeg, gif ou png</p>' ;
                            }
                        }
                        else{
                            echo '<p class="msg_inscription error">L\'image ne dois pas d??passer 2mo</p>' ; 
                        }

                    }
                }
            }
            else{
                echo ' Veuillez remplir un champs de texte'; 
            }
        }
        else {
            echo ' Veuillez remplir un champs de texte'; 
        }
    }


?>


<section id="section_centrale">


    <div id="div3">
        <article id="contenu_div3">

            <div id="pres_user_connect">
                <div class="img_user_connect">
                    <img src="img/<?=$_SESSION['avatar']?>" alt="#">
                </div>
                <div class="infos_user_connecte">
                <p><?=$_SESSION['prenom'];?></p>
                    <p>@<?=$_SESSION['prenom']?><?=$_SESSION['nom']?></p>
                </div>
            </div>
            
            <nav id="menu">
                <ul>
                    <li><a href="#"><i class="fa fa-home"></i> Accueil </a></li>
                    <li><a href="#"><i class="fa fa-user-circle"></i> Profil </a></li>
                </ul>
            </nav>
            
            <h2> Conversations </h2>
            
            <div id="conv">
            <?php
                    foreach($result as $key => $value)
                    {
                        ?>
                        <a href="pages/chat.php?groupe=<?=$value['nom_du_groupe']?>">
                            <div class="liste_groupes">
                                <div>
                                    <img src="img/group.svg" alt="#">
                                </div>
                                <div class='nom_du_groupe'>
                                    <p><?=$value['nom_du_groupe']?></p>
                                </div>
                            </div>
                            </a>
                         <?php
                    }
                
                ?>
                
            </div>
            
        </article>

    </div>
    
    
    <div id="div2">

    

<article id="new_post">
    <div class="contenu_new_post">
        <form method="POST" id="form_add_comment" enctype="multipart/form-data">
        <div class="search_bar_post">
            <input type="text" name="input_text" id="input_text" placeholder="Quoi de neuf ?">
            <input type="submit" id="btn-post" form="form_add_comment" name="bouton-post"> 
        </div>            
        <div class="choix_image" style="display: none;">
            <i class="fa fa-image fa-lg" id="pictures_post"></i>
            
            <input type="file" name="choix_image[]" id="choix_image" multiple>
            <p> Tous les utilisateurs peuvent voir votre post </p>
        </div>   
    </form>
</div>
</article>
<?php 
$vue_post->displayPost($infos_post,$post); ?>

<article class="post" data-id="1">
        <div class="post_image">
            <div class="photo_profil">
                <img src="img/pp.jpg" alt="#">
            </div>
            <div class="pseudo_user">
                <p class="bold"> Pseudo de l'utilisateur </p>
                <p> 2m </p>
            </div>
        </div>

        <div class="description_post">
            <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sit dolorem aliquid nesciunt laudantium? Similique iste voluptatibus magni facilis excepturi, natus velit architecto deleniti, assumenda qui minus nemo neque ex.</p>
        </div>

        <div class="like_post">
            <div>
                <i class="fa fa-thumbs-up btn_like" style="color: rgb(250, 95, 90);"></i>
            </div>
            <p class="compteur_like"> 128 </p>
            <div>
                <i class="fa fa-comments button_comment"></i>
            </div>
            <p> 40 </p>
            
        </div>

        <div class="comment_post" style="display: none;">
            <div class="contenu_comment">
                <div class="comment">
                    <div id="img_comment">
                        <img src="img/pp.jpg" alt="#">
                    </div>
                    <div id="description_comment">
                        <p class="bold"> Nom de la personne </p>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, excepturi? Expedita, doloremque.</p>
                    </div>
                </div>   
            </div>    
                
            <div id="link_autres_comment">
                <p class="button_all_comment"> Voir tous les commentaires </p>
            </div>

            <div id="form_comment">
                <div class="img_form_comment">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div class="input_form_comment">
                    <textarea placeholder="Ecrire un commentaire...."></textarea>
                    <input type="button" value="Envoyer" class="input_ajout_comment">
                </div>
            </div>
                
        </div>
    </article>

    <article class="post" data-id="2">
        <div class="post_image">
            <div class="photo_profil">
                <img src="img/pp.jpg" alt="#">
            </div>
            <div class="pseudo_user">
                <p class="bold"> Pseudo de l'utilisateur </p>
                <p> 2m </p>
            </div>
        </div>

        <div class="description_post">
            <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sit dolorem aliquid nesciunt laudantium? Similique iste voluptatibus magni facilis excepturi, natus velit architecto deleniti, assumenda qui minus nemo neque ex.</p>
        </div>

        <div class="like_post">
            <div>
                <i class="fa fa-thumbs-up btn_like" style="color: rgb(250, 95, 90);"></i>
            </div>
            <p class="compteur_like"> 128 </p>
            <div>
                <i class="fa fa-comments button_comment"></i>
            </div>
            <p> 40 </p>
            
        </div>

        <div class="comment_post" style="display: none;">
            <div class="contenu_comment">
                <div class="comment">
                    <div id="img_comment">
                        <img src="img/pp.jpg" alt="#">
                    </div>
                    <div id="description_comment">
                        <p class="bold"> Nom de la personne </p>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, excepturi? Expedita, doloremque.</p>
                    </div>
                </div>   
            </div>    
                
            <div id="link_autres_comment">
                <p class="button_all_comment"> Voir tous les commentaires </p>
            </div>

            <div id="form_comment">
                <div class="img_form_comment">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div class="input_form_comment">
                    <textarea placeholder="Ecrire un commentaire...."></textarea>
                    <input type="button" value="Envoyer" class="input_ajout_comment">
                </div>
            </div>
                
        </div>
    </article>

    <article class="post" data-id="3">
        <div class="post_image">
            <div class="photo_profil">
                <img src="img/pp.jpg" alt="#">
            </div>
            <div class="pseudo_user">
                <p class="bold"> Pseudo de l'utilisateur </p>
                <p> 2m </p>
            </div>
        </div>

        <div class="description_post">
            <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sit dolorem aliquid nesciunt laudantium? </p>
        </div>

        <div class="image_post">
            <img src="img/landscape.jpg" alt="#">
        </div>

        <div class="like_post">
            <div>
                <i class="fa fa-thumbs-up btn_like" style="color: rgb(250, 95, 90);"></i>
            </div>
            <p class="compteur_like"> 128 </p>
            <div>
                <i class="fa fa-comments button_comment"></i>
            </div>
            <p> 40 </p>
            
        </div>

        <div class="comment_post" style="display: none;">
            <div class="contenu_comment">
                <div class="comment">
                    <div id="img_comment">
                        <img src="img/pp.jpg" alt="#">
                    </div>
                    <div id="description_comment">
                        <p class="bold"> Nom de la personne </p>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, excepturi? Expedita, doloremque.</p>
                    </div>
                </div>   
            </div> 
                
            <div id="link_autres_comment">
                <p class="button_all_comment"> Voir tous les commentaires </p>
            </div>

            <div id="form_comment">
                <div class="img_form_comment">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div class="input_form_comment">
                    <textarea placeholder="Ecrire un commentaire...."></textarea>
                    <input type="button" value="Envoyer" class="input_ajout_comment">
                </div>
            </div>
                
        </div>
    </article>

    <article class="post" data-id="4">
        <div class="post_image">
            <div class="photo_profil">
                <img src="img/pp.jpg" alt="#">
            </div>
            <div class="pseudo_user">
                <p class="bold"> Pseudo de l'utilisateur </p>
                <p> 2m </p>
            </div>
        </div>

        <div class="description_post">
            <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sit dolorem aliquid nesciunt laudantium? </p>
        </div>

        <div class="image_post">
            <div>
                <img src="img/landscape.jpg" alt="#">
            </div>
            <div class="galerie">
                <div>
                    <img src="img/landscape2.jpg" alt="">
                </div>
                <div>
                    <img src="img/landscape3.jpg" alt="">
                </div> 
            </div>
        </div>

        <div class="like_post">
            <div>
                <i class="fa fa-thumbs-up btn_like" style="color: rgb(250, 95, 90);"></i>
            </div>
             <p class="compteur_like"> 128 </p>
            <div>
                <i class="fa fa-comments button_comment"></i>
            </div>
            <p> 40 </p>
            
        </div>

        <div class="comment_post" style="display: none;">
            <div class="contenu_comment">
                <div class="comment">
                    <div id="img_comment">
                        <img src="img/pp.jpg" alt="#">
                    </div>
                    <div id="description_comment">
                        <p class="bold"> Nom de la personne </p>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, excepturi? Expedita, doloremque.</p>
                    </div>
                </div>   
            </div> 
                
            <div id="link_autres_comment">
                <p class="button_all_comment"> Voir tous les commentaires </p>
            </div>

            <div id="form_comment">
                <div class="img_form_comment">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div class="input_form_comment">
                    <textarea placeholder="Ecrire un commentaire...."></textarea>
                    <input type="button" value="Envoyer" class="input_ajout_comment">
                </div>
            </div>
                
        </div>
    </article>

    <button id="voir_plus"> Voir plus </button>
</div>

<div id="div1">
    <article id="contenu_div1">

        <div id="bloc_search_bar">
            <input type="search" name="barre_de_recherche" id="search_bar_users">

        </div>
        <div id="resultat_autocompl">
        </div>
        <div id="users_list">
            
        </div>
    </article>
</div>






</section>





</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="scripts/commentaires.js"></script>
<script src="scripts/script_post.js"></script>
<script src="scripts/like.js"></script>
<script src="scripts/deconnecte_index.js"></script>
<script src="scripts/autocompletion.js"></script>
<script src="scripts/add_post.js"></script>
<script src="scripts/scroll.js"></script>

</html>