<?php 
session_start();
require_once('model/database.php');
require_once('model/display_chat_groupe.php');

// var_dump($_SESSION);
$mail = $_SESSION['mail'];
// var_dump($mail);
// var_dump($bdd);
$deco = $bdd->prepare('UPDATE users SET connecte = 1 WHERE mail = :mail');
$deco->execute(array('mail' => $mail));
$variableAPasser = $_SESSION['id'];


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
                <div id="div_like_button_creer_groupe">CREER UN GROUPE</div>

                <div id="liste_user_pour_creer_groupe">
                    <p class='liste_pseudo_groupe'>pseudo</p>
                    <button>créer</button>
                </div>

                <?php
                    foreach($groupe as $key => $value)
                    {
                        ?>
                            <div class="liste_groupes">
                                <div>
                                    <img src="img/group.svg" alt="#">
                                </div>
                                <div class='nom_du_groupe'>
                                    <p><?=$value[0]?></p>
                                </div>
                            </div>
                         <?php
                    }
                
                ?>
                               
            </div>
            
        </article>

    </div>
    
<!-- zone pour les messages -->
<div id="div2">
    <div id="user_selection_chat">
    </div>

    <div id="conteneur_des_messages">
    </div>

    <div id="intput_chat_et_button">
        <input id="input_messages" type="text">
        <button id="button_envoyer_message">ENVOYER</button>
    </div>


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
<script>
 var variableRecuperee = <?php echo json_encode($variableAPasser); ?>;
</script>
<script src="scripts/chat_prive.js"></script>

</html>