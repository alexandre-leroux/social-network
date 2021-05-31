<?php

namespace Models; 

// require_once("../libraries/database.php"); 

abstract class Model {

    // protected $bdd; 

    // public function __construct()
    // {
    //     $this->bdd = getPdo(); 
    // }

    protected $bdd;
    protected $table;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->bdd = \Database::getPdo();
    }

}