<?php 
session_start();
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/style.css" />
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




</div>
<div id="div2"></div>
<div id="div3"></div>




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
<script src="scripts/users_connecte.js"></script>
</html>