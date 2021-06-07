<?php 
session_start();
if
    (!isset($_SESSION['mail'])){
        header('Location: ../index.php');
    }
require_once("../libraries/autoload.php");
$mail = $_SESSION['mail'];
$mon_id = $_SESSION['id'];

$groupe = new \Models\Chat();
$result = $groupe->display_groupes($mon_id);

$vue_chat = new \Vue\Chat();

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
    <link rel="stylesheet" href="../style/style_chat.css" />
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

   <?php
        $vue_chat->section_gauche($result);

        // <!-- zone pour les messages -->
        $vue_chat->section_centrale();

        $vue_chat->section_droite();

    ?>

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