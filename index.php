<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http"). // Permet de remplacer index.php par du vide. On test si on est sur https ou http le bon
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); // http host qui est "localhost" PHP_self le chemin 

require_once 'controllers/LivresController.controller.php';
$livreController = new LivresController;

try{
if(empty($_GET['page'])){
    require "views/accueil.view.php";
} else {

    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL); // Decomposition url explose l'url à partir du /
    // print_r($url);
    switch($url[0]){
        case "accueil" : require "views/accueil.view.php";
        break;
        case "livres" : 
        if(empty($url[1])) {
            $livreController->afficherLivres();
        } else if ($url[1] === "l"){
            echo "affichage d'un livre"; 
        } else if ($url[1] === "a"){
            echo "Ajout d'un livre";
        } else if ($url[1] === "m"){ // url pour modif livre "livres/m"
            echo "Modifier un livre";
        } else if ($url[1] === "s"){
            echo "Supprimer un livre";
        } else {
            throw new Exception("La page n'existe pas");
        }

        break;
     }       
  }
}

catch(Exception $e){
    echo $e->getMessage();
}
