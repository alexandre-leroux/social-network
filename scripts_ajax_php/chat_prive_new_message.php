<?php
session_start();
require_once("../libraries/autoload.php");

 $id_moi = $_SESSION['id'];

 $groupe = new \Models\Chat();
 $result = $groupe->chat_groupe_add_new_message($id_moi);
 

