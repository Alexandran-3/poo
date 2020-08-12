<?php
require_once "models/LivreManager.class.php";

class LivresController{
    private $livreManager;

    public function __construct(){
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres(); //LivreManager dispose de tous les livres présent en BDD
    }

    public function afficherLivres(){
        $livres = $this->livreManager->getLivres();
        require "views/livres.view.php";
    }
}