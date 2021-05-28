<?php
    session_start();
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
        <!-- Bulma Version 0.9.0-->
        <link rel="stylesheet" href="../style/style.css" />
        <link rel='stylesheet prefetch' href='https://unpkg.com/bulma@0.9.0/css/bulma.min.css'>
        <link rel="stylesheet" href="../style/style-profil.css">
        <script src="https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
    </head>
    <body>
<?php
    if (!isset($_SESSION['mail'])) {
    ?>

<header>
    <nav>
        <div class="logo_text_header">
            <div class="logo_network">
                <img src="../img/logo.svg" alt="#">
            </div>
            <div class="nom_header">
                <h1> la plateforme_ network </h1>
            </div>
        </div>
        <ul>
            <li><a href="inscription.php">S'inscrire</a></li>
            <li><a href="connexion.php">Se connecter</a></li>
        </ul>
    </nav>
</header>
<?php
    } else {
    ?>
<header >
    <nav>
        <h1>BIENVENUE                                                                                                                               <?php echo $_SESSION['prenom'] ?></h1>
        <a href="../model/deconnexion.php">déconnexion</a>
    </nav>
</header>



<?php
    }
?>
        <section class="hero custom-background" id="section_centrale">
            <div class="hero-body">
                <div class="container is-flex">
                    <figure class="image is-128x128">
                        <img src="../img/Alex.jpg" class="is-rounded" alt="profil_photo">
                    </figure>
                    <div class="ml-6 is-flex-direction-row top-profil-content">
                    <h1 class="Nom-prenom">
                    Alexandre Leroux
                    </h1>
                    <h2 class="sous-titre">
                    Big boss des téléscopes
                    </h2>
                    <?php
                        if (isset($_SESSION['mail'])) {
                        ?>
                    <button class="button custom-button">Editer le profil</button>
    <?php
    } else {
        ?>              <span></span>
    <?php }
    ?>
                    </div>
                </div>
            </div>
            <div class="tabs is-boxed is-centered main-menu" id="nav">
                <ul>
                    <li data-target="pane-2" id="2" class="is-active">
                        <a class="tabs-title">
                            <span class="icon is-small"><i class="fab fa-empire"></i></span>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li data-target="pane-3" id="3">
                        <a class="tabs-title">
                            <span class="icon is-small"><i class="fab fa-superpowers"></i></span>
                            <span>A propos</span>
                        </a>
                    </li>
                    <li data-target="pane-1" id="1">
                        <a class="tabs-title">
                            <span class="icon is-small"><i class="fa fa-image"></i></span>
                            <span>Photos</span>
                        </a>
                    </li>
                    <li data-target="pane-4" id="4">
                        <a class="tabs-title">
                            <span class="icon is-small"><i class="fa fa-film"></i></span>
                            <span>Video</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="pane-1">
                    <figure>
                        <img src="https://source.unsplash.com/0_xMuEbpFAQ/400x400" alt="💯" class="cent">
                    </figure>
                    <figure>
                        <img src="https://source.unsplash.com/wPMvPMD9KBI/800x600" alt="💯" class="cent">
                    </figure>
                </div>
                <div class="tab-pane" id="pane-3">
                    <div class="columns">
                        <div class="container">
                            <div class="columns">
                                <div class="column">
                                    <article class="media">
                                        <div class="media-left">
                                            <i class="fab fa-github-square fa-4x"></i>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>Dominic Ipsum</strong>
                                                    <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <div class="media-left">
                                            <i class="fab fa-empire fa-4x"></i>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>Cassie Ipsum</strong>
                                                    <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="column">
                                    <article class="media">
                                        <div class="media-left">
                                            <i class="fab fa-ravelry fa-4x"></i>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>Avery Ipsum</strong>
                                                    <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <div class="media-left">
                                            <i class="fab fa-github-alt fa-4x"></i>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>io Ipsum</strong>
                                                    <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis. ╳
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pane-4">
                    <div class="columns is-centered">
                        <div class="column is-three-quarters">
                            <div class="embed-container image">
                                <iframe src="https://player.vimeo.com/video/261794608" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- post tabs  -->
                <div class="tab-pane is-active" id="pane-2">
                    <!-- creation de post -->
                                 <div class="content container-is-fluid">
                    <div id="div2">
                        <article class="post">
        <div class="post_image">
            <figure class="image is-128x128">
                <img class="is-rounded" src="../img/Alex.jpg" alt="#">
           </figure>
            <div class="pseudo_user">
                <p class="bold"> Alexandre Leroux </p>
                <p> 2m </p>
            </div>
        </div>

        <div class="description_post">
            <p> Des vacances oui, mais jamais sans coder !</p>
        </div>

        <div class="image_post is-flex is-justify-content-center is-align-content-center is-align-items-center">
            <div>
                <img src="../img/Alex-en-Vacances.jpg" alt="#">
            </div>
            <!-- <div class="galerie">
                <div>
                    <img src="../img/landscape2.jpg" alt="">
                </div>
                <div>
                    <img src="../img/landscape3.jpg" alt="">
                </div>
            </div> -->
        </div>

                    <div class="content container-is-fluid">
                    <div id="div2">
                        <article class="post">
        <div class="post_image">
            <figure class="image is-128x128">
                <img class="is-rounded" src="../img/Alex.jpg" alt="#">
           </figure>
            <div class="pseudo_user">
                <p class="bold"> Alexandre Leroux </p>
                <p> 2m </p>
            </div>
        </div>

        <div class="description_post">
            <p> Des vacances oui, mais jamais sans coder !</p>
        </div>

        <div class="image_post is-flex is-justify-content-center is-align-content-center is-align-items-center">
            <div>
                <img src="../img/Alex-en-Vacances.jpg" alt="#">
            </div>
            <!-- <div class="galerie">
                <div>
                    <img src="../img/landscape2.jpg" alt="">
                </div>
                <div>
                    <img src="../img/landscape3.jpg" alt="">
                </div>
            </div> -->
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
            <div class="comment">
                <div id="img_comment">
                    <img src="../img/pp.jpg" alt="#">
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
                    <img src="../img/pp.jpg" alt="#">
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
                <img src="../img/pp.jpg" alt="#">
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
            <div class="comment">
                <div id="img_comment">
                    <img src="../img/pp.jpg" alt="#">
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
                    <img src="../img/pp.jpg" alt="#">
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
                <img src="../img/pp.jpg" alt="#">
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
            <div class="comment">
                <div id="img_comment">
                    <img src="../img/pp.jpg" alt="#">
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
                    <img src="../img/pp.jpg" alt="#">
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
                <img src="../img/pp.jpg" alt="#">
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
            <img src="../img/landscape.jpg" alt="#">
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
            <div class="comment">
                <div id="img_comment">
                    <img src="../img/pp.jpg" alt="#">
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
                    <img src="../img/pp.jpg" alt="#">
                </div>
                <div class="input_form_comment">
                    <textarea placeholder="Ecrire un commentaire...."></textarea>
                    <input type="button" value="Envoyer">
                </div>
            </div>

        </div>
    </article>


</div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="../scripts/tabs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../scripts/commentaires.js"></script>
<?php
if (isset($_SESSION['mail'])) {?>
<script src="../scripts/connecte.js"></script>
<?php
    }
?>
<script src="../scripts/deconnecte.js"></script>
<script src="../scripts/users_connecte.js"></script>
</html>