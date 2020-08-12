<?php

require_once "models/Model.class.php";
require_once "models/Livre.class.php";

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
        $meslivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($meslivres as $livre) {
        
        
            $l = new Livre($livre['id'], $livre['titre'], $livre['nbPages'], $livre['image'] );
            //Genere les livres
            $this->ajoutLivre($l);
        }
        
        
    }
}