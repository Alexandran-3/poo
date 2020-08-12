<?php

abstract class Model {

    private static $pdo; // static pour qu'ils soit accessible par toute les class qui heritera de la class Model


    private static  function setBdd() {
        self::$pdo = new PDO("mysql:host=localhost;dbname=bibliopoo;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd() {
        if(self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}