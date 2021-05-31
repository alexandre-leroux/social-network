<?php
session_start();
require_once("../libraries/autoload.php");


 $id_user_selectionne = $user['id'];
 $id_moi = $_SESSION['id'];

 $groupe = new \Models\Chat();
 $result = $groupe->chat_prive($id_moi, $id_user_selectionne);

