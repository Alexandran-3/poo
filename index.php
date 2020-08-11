<?php

if(empty($GET['page'])) {
    require 'views/accueil.views.php';
} else {
    switch($GET['page']) {
        case "accueil" : require 'views/accueil.views.php';
        break;
    }
}
