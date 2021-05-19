<?php 
session_start();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../style/style.css" />
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
    <div class="conteneur_form_inscription">
        <form action="../model/inscription.php" method="POST" >


        <div class="form-group">
            <label for="prenom"> Prenom : </label> 
            <input type="text" id="prenom" name="prenom" >
        </div>

        <div class="form-group">
            <label for="nom"> Nom : </label> 
            <input type="text" id="nom" name="nom" >
        </div>

        <div class="form-group">
            <label for="mail"> Mail : </label>
            <input type="email"  id="mail" name="mail" >
        </div>

        <div class="form-group">
            <label for="avatar">Choisir une photo de profil : </label>
            <input type="file" id="avatar" name="avatar">
        </div>

        <div class="form-group">
            <label for="mdp"> Mot de passe : </label>
            <input  type="password"  id="mdp" name="mdp" >
        </div>

        <div class="form-group">
            <label for="confirm_mdp"> Confirmer le mot de passe : </label>
            <input  type="password"  id="confirm_mdp" name="confirm_mdp" >
        </div>

        <div class="form_group">
            <label for="hobbies"> Hobbies : </label>
            <input type="text" name="hobbies" id="input_hobbies">
            <ul id="list_hobbies"></ul>
        </div>

        <div id="validation_inscription">
            <input  type="submit" value="VALIDER L'INSCRIPTION" name="valider">
        </div>    

        </form>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>