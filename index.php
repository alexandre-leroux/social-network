<?php 
session_start();
var_dump($_SESSION);

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

<header >
    <nav>
        <a href="pages/inscription.php">inscription</a>
        <a href="pages/connexion.php">connexion</a>
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
    </nav>
</header>



<?php
}
?>

<h1>BIENVENUR SUR SOCIAL NETWORK</h1>
<section id="section_centrale">

<div id="div1">

    <div id="bloc_search_bar">
        <input type="search" name="barre_de_recherche" id="search_bar_users">
        <i class="fa fa-search"></i>
    </div>
    
    <div id="users_list">

    </div>

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
                <i class="fa fa-comments" id="button_comment"></i>
            </div>
            <p> 40 </p>
            
        </div>

        <div class="comment_post" style="display: none;">
            <div class="comment">
                <div id="img_comment">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div id="description_comment">
                    <p class="bold"> Nom de la personne </p>
                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, excepturi? Expedita, doloremque.</p>
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
                    <input type="button" value="Envoyer">
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
                <i class="fa fa-comments"></i>
            </div>
            <p> 40 </p>
            
        </div>

        <div class="comment_post" style="display: none;">
            <div class="comment">
                <div id="img_comment">
                    <img src="img/pp.jpg" alt="#">
                </div>
                <div id="description_comment">
                    <p class="bold"> Nom de la personne </p>
                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, excepturi? Expedita, doloremque.</p>
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
                    <input type="button" value="Envoyer">
                </div>
            </div>
                
        </div>
    </article>
</div>
<div id="div3"></div>




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
<script src="scripts/chat_prive.js"></script>
<script src="scripts/users_connecte.js"></script>
</html>