<?php


class AdminController extends Controller {

    public function __construct()
    {
        $this->path_view = 'view/admin/';
        $this->path_view_communes = 'view/commun/admin/';
    }

    public function index()
    {
        $this->render('index');
    }

    public function login()
    {
        $this->render('login');
    }

    public function checkLoginPostForm()
    {
        var_dump($_POST);
        $utilisateur = Utilisateur::getUserWithMail($_POST['mail']);
        // var_dump($utilisateur);
        if (!$utilisateur){
            // erreur user introuvable en BDD
            $_SESSION['error_form_login'] = true;
            return $this->render('login');
        }
        if (!password_verify($_POST['mot_de_passe'], $utilisateur->mot_de_passe)){
            //erreur l'user mais le mdp ne correspond pas
            $_SESSION['error_form_login'] = true;
            return $this->render('login');
        }
        $_SESSION['utilisateur'] = $utilisateur;
        $_SESSION['connexion'] = true;
    }
}