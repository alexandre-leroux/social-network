<?php 
session_start();
if(!isset($_SESSION['mail'])){
    header('Location: ../index.php');
}
require_once("../libraries/autoload.php");
$mail = $_SESSION['mail'];
$mon_id = $_SESSION['id'];

$groupe = new \Models\Chat();
$result = $groupe->display_groupes($mon_id);

$user = new \Models\User(NULL,NULL,NULL,$mail,NULL,NULL,NULL);
$user->updateConnecte($mail);

$session_id_php = $_SESSION['id'];
$session_prenom_php = $_SESSION['prenom'];

$pseudo_for_js = @$_GET['pseudo'];

    $groupe_for_js = @$_GET['groupe'];



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>social network</title>
</head>


<body>


<header >
    <nav>
        <h1>BIENVENUE <?= $_SESSION['prenom']?></h1>
        <a href="deconnexion.php">déconnexion</a>
    </nav>
</header>





<section id="section_centrale">

    <div id="div3">
        <article id="contenu_div3">

            <div id="pres_user_connect">
                <div class="img_user_connect">
                    <img src="../img/<?=$_SESSION['avatar']?>" alt="#">
                </div>
                <div class="infos_user_connecte">
                    <p><?=$_SESSION['prenom'];?></p>
                    <p>@<?=$_SESSION['prenom']?><?=$_SESSION['nom']?></p>
                </div>
            </div>
            
            <nav id="menu">
                <ul>
                    <li><a href="../index.php"><i class="fa fa-home"></i> Accueil </a></li>
                    <li><a href="profil.php"><i class="fa fa-user-circle"></i> Profil </a></li>
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
                    foreach($result as $key => $value)
                    {
                        ?>
                        <a>
                            <div class="liste_groupes">
                                <div>
                                    <img src="../img/group.svg" alt="#">
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
        
        </div>
        <div id="users_list">
            
        </div>
    </article>
</div>






</section>





</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="../scripts/autocompletion_chat.js"></script>

<script src="../scripts/deconnecte.js"></script>
<script>
 var session_id_php = <?php echo json_encode($session_id_php); ?>;
 var session_prenom_php = <?php echo json_encode($session_prenom_php); ?>;
 var pseudo_get = <?php echo json_encode($pseudo_for_js); ?>;
 var groupe_get = <?php echo json_encode($groupe_for_js); ?>;
</script>

<?php
if($pseudo_for_js)
{
?>
<script src="../scripts/get_user_chat.js"></script>
<?php
}

if($groupe_for_js)
{
?>
<script src="../scripts/get_groupe_chat.js"></script>

<?php
}
?>
<script src="../scripts/chat_prive.js"></script>


</html>