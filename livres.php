<?php


require_once 'Livre.class.php';
$l1 = new Livre(1, "Central Park", 448, "park.jpg");
$l2 = new Livre(2, "Miracle Morning", 297, "morning.jpg");
$l3 = new Livre(3, "En route pour Symfony 5", 320, "symfony.jpg");
$l4 = new Livre(4, "Le petit prince", 180, "prince.jpg");


require_once "LivreManager.class.php";
$livreManager = new LivreManager;
$livreManager->ajoutLivre($l1);
$livreManager->ajoutLivre($l2);
$livreManager->ajoutLivre($l3);
$livreManager->ajoutLivre($l4);

ob_start(); 
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    $livres = $livreManager->getLivres();
    for($i=0; $i < count($livres);$i++) : 
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage(); ?>" width="60px;"></td>
        <td class="align-middle"><?= $livres[$i]->getTitre(); ?></td>
        <td class="align-middle"><?= $livres[$i]->getNbPages(); ?></td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endfor; ?>
</table>
<a href="" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Les livres de la bibliothèque";
require "template.php";
?>