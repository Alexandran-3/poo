<?php


ob_start(); ?> 

Ici la page d'accueil

<?php
$content = ob_get_clean(); //Permet de deverser ce quil ya entre les deux fonction dans content
$titre = 'Bibliothèque';
require 'template.php';
?>