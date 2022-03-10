<?php 
    require 'autoloader.php';

    var_dump($_GET);
    if (isset($_GET['controller'])) {
        $controller = new $_GET['controller'](); // LivreController
        if (isset($_GET['methode'])){
            $methode = $_GET['methode'];
        }else{
            $methode = "index";
        }
        if (isset($_GET['id'])){
            $controller->$methode($_GET['id']);
        }else{
            $controller->$methode();
        }
    }