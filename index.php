<?php 
session_start();
// require_once('model/database.php');

// var_dump($_SESSION);
// $mail = $_SESSION['mail'];
// var_dump($mail);
// var_dump($bdd);
// $deco = $bdd->prepare('UPDATE users SET connecte = 1 WHERE mail = :mail');
// $deco->execute(array('mail' => $mail));

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
?>

<header>
    <nav>
        <div class="logo_text_header">
            <div class="logo_network">
                <img src="img/logo.svg" alt="#">
            </div>
            <div class="nom_header">
                <h1> la plateforme_ network </h1>
            </div>
        </div>
        <ul>
            <li><a href="pages/inscription.php">S'inscrire</a></li>
            <li><a href="pages/connexion.php">Se connecter</a></li>
        </ul>
    </nav>
</header>
<?php
}
else
{
?>
<header >
    <nav>
        <h1>BIENVENUE <?= $_SESSION['prenom']?></h1>
        <a href="model/deconnexion.php">déconnexion</a>
        <a href="chat.php">chat</a>
    </nav>
</header>



<?php
}
?>


<section id="section_centrale">

    <div id="div3">
        <article id="contenu_div3">

            <div id="pres_user_connect">
                <div class="img_user_connect">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div class="infos_user_connecte">
                    <p> Baptiste </p>
                    <p>@baptistegauthier</p>
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
                <div>
                    <div>
                        <img src="img/group.svg" alt="#">
                    </div>
                    <div>
                        <p> Groupe 1 </p>
                    </div>
                </div>
                
                <div>
                    <div>
                        <img src="img/group.svg" alt="#">
                    </div>
                    <div>
                        <p> Groupe 2 </p>
                    </div>
                </div>
                
                <div>
                    <div>
                        <img src="img/group.svg" alt="#">
                    </div>
                    <div>
                        <p> Groupe 3 </p>
                    </div>
                </div>
                
            </div>
            
        </article>

    </div>
    
    
    <div id="div2">
    <article class="post">
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
                <i class="fa fa-thumbs-up" ></i>
            </div>
            <p> 128 </p>
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
                <p> Voir tous les commentaires </p>
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

    <article class="post">
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
                <i class="fa fa-thumbs-up"></i>
            </div>
            <p> 128 </p>
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
                <p> Voir tous les commentaires </p>
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

    <article class="post">
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
                <i class="fa fa-thumbs-up"></i>
            </div>
            <p> 128 </p>
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
                <p> Voir tous les commentaires </p>
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

    <article class="post">
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
                <i class="fa fa-thumbs-up"></i>
            </div>
            <p> 128 </p>
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
                <p> Voir tous les commentaires </p>
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
</div>

<div id="div1">
    <article id="contenu_div1">

        <div id="bloc_search_bar">
            <input type="search" name="barre_de_recherche" id="search_bar_users">
            <i class="fa fa-search"></i>
        </div>
        <div id="users_list">
            
        </div>
    </article>
</div>






</section>





</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="scripts/commentaires.js"></script>
<?php
if(isset($_SESSION['mail']))
{?>
<script src="scripts/connecte.js"></script>
<?php
}
?>
<script src="scripts/deconnecte.js"></script>
<script src="scripts/users_connecte.js"></script>
</html>