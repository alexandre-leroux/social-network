<?php

namespace Models; 

require_once("libraries/database.php"); 

abstract class Model {

    protected $bdd; 

    public function __construct()
    {
        $this->bdd = getPdo(); 
    }
}