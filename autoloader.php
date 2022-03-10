<?php
    spl_autoload_register(function ($class_name) {
        if (!preg_match('#Controller#', $class_name)){
            $dossier = 'model';
        }else{
            $dossier = 'controller';
        }
        include $dossier .'/'. $class_name . '.php';
    });