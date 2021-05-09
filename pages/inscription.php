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
                        <label for="prenom">prenom : </label> 
                        <input class="input_form_inscription"  type="text" id="prenom" name="prenom" >
                    </div>

                    <div class="form-group">
                        <label for="mail">mail : </label>
                        <input class="input_form_inscription" type="email"  id="mail" name="mail" >
                    </div>

                    <!-- <div class="form-group">
                        <label for="mdp"> Mot de passe : </label>
                        <input class="input_form_inscription" type="password"  id="mdp" name="mdp" >
                    </div> -->

                    <div id="validation_inscription">
                        <input  type="submit" value="VALIDER L'INSCRIPTION" name="valider">
                    </div>    

                    </form>
                </div>
</section>





</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
if(isset($_SESSION['mail']))
{?>
<script src="scripts/connecte.js"></script>
<?php
}
?>
<script src="scripts/deconnecte.js"></script>
</html>