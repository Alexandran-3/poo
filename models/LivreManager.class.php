<?php
require_once "Model.class.php";
require_once "Livre.class.php";

class LivreManager extends Model{
    private $livres;//tableau de Livre

    public function ajoutLivre($livre){
        $this->livres[] = $livre;
    }

    public function getLivres(){
        return $this->livres;
    }

    public function chargementLivres(){
        $req = $this->getBdd()->prepare("SELECT * FROM livre");
        $req->execute();
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesLivres as $livre){
            $l = new Livre($livre['id'],$livre['titre'],$livre['nbPages'],$livre['image'],$livre['auteur']);
            $this->ajoutLivre($l);
        }
    }

    public function getLivreById($id){ // Parcours le tableau de livre et renvoie le livre s'il est trouvé
        for($i=0; $i < count($this->livres);$i++){
            if($this->livres[$i]->getId() === $id){
                return $this->livres[$i];
            }
        }
        throw new Exception("Le livre n'existe pas");
    }

    public function ajoutLivreBd($titre,$nbPages,$image,$auteur){
        $req = "
        INSERT INTO livre (titre, nbPages, image, auteur)
        values (:titre, :nbPages, :image, :auteur)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":auteur",$auteur,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $livre = new Livre($this->getBdd()->lastInsertId(),$titre,$nbPages,$image,$auteur);
            $this->ajoutLivre($livre);
        }        
    }

    public function suppressionLivreBD($id){
        $req = "
        Delete from livre where id = :idLivre
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }  

    public function modificationLivreBD($id,$titre,$nbPages,$image, $auteur){
        $req = "
        update livre
        set titre = :titre, nbPages = :nbPages, image = :image, auteur = :auteur
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":auteur",$auteur,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getLivreById($id)->setTitre($titre); //mise a jour titre livre
            $this->getLivreById($id)->setTitre($nbPages);
            $this->getLivreById($id)->setTitre($image);
            $this->getLivreById($id)->setTitre($auteur);
        }
    }

    

}