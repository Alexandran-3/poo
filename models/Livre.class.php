<?php
class Livre{
    private $id;
    private $titre;
    private $nbPages;
    private $image;
    private $auteur;

    public function __construct($id,$titre,$nbPages,$image,$auteur){
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;
        $this->auteur = $auteur;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getNbPages(){return $this->nbPages;}
    public function setNbPages($nbPages){$this->nbPages = $nbPages;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}

    public function getAuteur(){return $this->auteur;}
    public function setAuteur($auteur){$this->auteur = $auteur;}
}