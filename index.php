<?php 
    // var_dump($_GET);
    require_once 'autoloader.php';
    
    // TODO: création d'un objet générateur de lien pour créer des urls rapidement et facilement (rapide)
    // TODO: voir la page index et login du module d'administration
    // TODO: création du site (rapide)

    // si il existe un controller a instancier
    if (isset($_GET['controller'])) {
        // on instancie le controller (ex: LivreController)
        $controller = new $_GET['controller'](); // LivreController
        // si il existe une methode a utiliser
        if (isset($_GET['methode'])){
            // on la récupere
            $methode = $_GET['methode'];
        }else{
            // sinon par défaut c'est la methode index qui sera utilisé
            $methode = "index";
        }
        // on vérifie si on a indiqué un parametre en plus dans l'url (ici un id)
        if (isset($_GET['id'])){
            $controller->$methode($_GET['id']);
        }else{
            $controller->$methode();
        }
    }else{
        // SINON par défaut la page a afficher est l'index du module livre (pour le moment)
        (new LivreController())->index(); // syntaxe pour ne pas avoir a stocker un objet dans une variable pour utiliser une méthode
    }