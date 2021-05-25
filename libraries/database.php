<?php

    function getPdo()
    {
        try 
            {
                $bdd = new PDO('mysql:host=localhost;dbname=social-network;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                return $bdd;
            }
        catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
           }

    }
?>