<?php

require_once "Model.class.php";

class LivreManager extends Model{
    private $livres;

    public function ajoutLivre($livre){
        $this->livres[] = $livre;
    }

    public function getLivres(){
        return $this->livres;
    }

    public function chargementLivres() {
        $req = $this->getBdd()->prepare("SELECT * FROM livre ORDER BY id DESC");
        $req->execute();
        $livres = $req->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($livres);
        echo "<pre>";
        
    }
}