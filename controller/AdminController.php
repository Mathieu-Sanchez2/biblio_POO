<?php


class AdminController extends Controller {

    
    /**
     * __construct
     * @return void
     */
    public function __construct() {
        // on utilise parent::__construct() pour utiliser le constructeur du parent (ici Controller.php)
        // Ici cela nous sert a récuperer l'etat de la connexion (vrai ou faux) grâce a l'appel dans le constructeur de Controller.php
        parent::__construct();
        $this->path_view = 'view/admin/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * Affiche l'index de l'administration si l'utilisateur est connecté, 
     * sinon le formulaire de connexion
     * @return string
     */
    public function index() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return $this->render('login');
        }
        // sinon on affiche l'index de l'administration
        return $this->render('index');
    }
    
    /**
     * login
     * Retourne le formulaire de connexion a l'administration
     * @return string
     */
    public function login() : string {
        if ($this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return $this->render('index');
        }
        return $this->render('login');
    }
    
    /**
     * logout
     *  Permet a un utilisateur d'effectuer une déconnexion
     * @return string
     */
    public function logout() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return $this->render('login');
        }
        // on recupere notre utilisateur sous forme d'objet (enregistrer au format string dans la session lors de la connexion)
        $utilisateur = unserialize($_SESSION['utilisateur']);
        // deconnexion de l'utilisateur
        $utilisateur->logout();
        // on redirige vers l'index du site web
        return (new SiteController)->render('index');
    }
    
    /**
     * checkLoginPostForm
     * Recupere et traite les données reçu du formulaire de connexion
     * Contient la logique de la connexion (recuperer un utilisateur, verifier le mdp, etablier la connexion, etc)
     * @return string
     */
    public function checkLoginPostForm() : string {
        // TRAITEMENT FORMULAIRE
        // var_dump($_POST);
        $mail = htmlentities($_POST['mail']);
        $mot_de_passe = htmlentities($_POST['mot_de_passe']);
        // on chercher un utilisateur par rapport a son mail en bdd
        $utilisateur = Utilisateur::getUserWithMail($mail);
        if ($utilisateur == null){
            # erreur : le mail ne correspond a aucun utilisateur en bdd
            return $this->render('login');
        }
        if (!$utilisateur->login($mot_de_passe)) {
            # erreur le mdp n'est pas bon
            return $this->render('login');
        }
        // si c'est ok, on affiche l'index de l'administration
        return $this->render('index');
    }
}