<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http"). // Permet de remplacer index.php par du vide. On test si on est sur https ou http le bon
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); // http host qui est "localhost" PHP_self le chemin 

require_once 'controllers/LivresController.controller.php';
$livreController = new LivresController;


if(empty($_GET['page'])){
    require "views/accueil.view.php";
} else {
    switch($_GET['page']){
        case "accueil" : require "views/accueil.view.php";
        break;
        case "livres" : $livreController->afficherLivres();
        break;
    }
    var_dump($_SERVER[PHP_SELF]);

        
}
