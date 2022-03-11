<?php
    spl_autoload_register(function ($class_name) {
        // on vérifie si l'objet a charger est un Controller ou un Model
        if (preg_match('#Controller#', $class_name) == 1){
            $dossier = 'controller';
        }else if (preg_match('#Helper#', $class_name) == 1){
            $dossier = 'helper';
        }else{
            $dossier = 'model';
        }
        # Exemple : controller/LivreController.php
        # ou
        # Exemple : model/Livre.php
        include $dossier .'/'. $class_name . '.php';
    });