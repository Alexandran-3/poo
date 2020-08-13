<?php
class Livre{
    private $id;
    private $titre;
    private $nbPages;
    private $image;
    private $categorie;

    public function __construct($id,$titre,$nbPages,$image,$categorie){
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;
        $this->categorie = $categorie;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getNbPages(){return $this->nbPages;}
    public function setNbPages($nbPages){$this->nbPages = $nbPages;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}

    public function getCategorie(){return $this->categorie;}
    public function setCategorie($categorie){$this->categorie = $categorie;}
}