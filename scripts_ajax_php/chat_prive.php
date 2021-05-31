<?php
session_start();
require_once("../libraries/autoload.php");

$pseudo = $_POST['pseudo'];
 $id_moi = $_SESSION['id'];

 $groupe = new \Models\Chat();
 $result = $groupe->chat_prive($id_moi, $pseudo);

