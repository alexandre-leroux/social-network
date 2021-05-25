<?php 
session_start();
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style_inscription.css">
    <title>social network</title>
</head>


<body>

<header >
    <nav>
        <a href="inscription.php">inscription</a>
        <a href="connexion.php">connexion</a>
    </nav>
</header>



<section class="section_formulaire_inscription">
    <h1> Connexion </h1>
    <div class="conteneur_form_inscription">
        <form method="POST" id="form_connexion">

            <div class="form-group">
                <label for="mail">Mail : </label>
                <input class="input_form_connexion" type="email"  id="mail" name="mail" >
            </div>

            <div class="form-group">
                <label for="mdp"> Mot de passe : </label>
                <input class="mdp_form_connexion" type="password"  id="mdp" name="mdp" >
            </div>

            <div id="validation_inscription">
                <input  type="submit" value="Se connecter" name="valider">
            </div>    

            <p class="message_statut"></p>

        </form>
    </div>
</section>



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../scripts/verif_connexion.js"></script>
<?php
if(isset($_SESSION['mail']))
{?>
<script src="scripts/connecte.js"></script>
<?php
}
?>
<script src="scripts/deconnecte.js"></script>
</html>