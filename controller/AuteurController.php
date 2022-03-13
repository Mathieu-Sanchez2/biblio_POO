<?php 

class AuteurController extends Controller {

        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        // on utilise parent::__construct() pour utiliser le constructeur du parent (ici Controller.php)
        // Ici cela nous sert a récuperer l'etat de la connexion (vrai ou faux) grâce a l'appel dans le constructeur de Controller.php
        parent::__construct();
        $this->path_view = 'view/auteur/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * Permet d'afficher la page index du module auteur
     * @return string
     */
    public function index() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $auteurs = Auteur::select();
        return $this->render('index', compact('auteurs'));
    }
    
    /**
     * single
     * Permet d'afficher la fiche d'un auteur
     * @param  string $_id
     * @return string
     */
    public function single(string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $auteur = Auteur::select($_id);
        return $this->render('single', compact('auteur'));
    }
    
    /**
     * add
     * Permet d'afficher le formulaire d'ajout d'un auteur
     * @return string
     */
    public function add() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        return $this->render('add');
    }
    
    /**
     * addValidPostForm
     * Recupere et traite les données recu du formulaire d'ajout d'un auteur
     * @return string
     */
    public function addValidPostForm() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $auteur = new Auteur($_POST);
        $auteur->photo = $_FILES['photo']['name'];
        // gestion photo
        if (!ImgHelper::addImgOnDirectory($_FILES, 'photo')) {
            # ERREUR : probleme ajout img
            return $this->add();
        }
        if (!$auteur->insert()) {
            # ERREUR : impossible d'ajouter l'auteur en bdd
            return $this->add();
        }
        return $this->index();
    }
    
    /**
     * update
     * Permet d'afficher le formulaire de modification avec les informations d'un auteur
     * @param string $_id
     * @return string
     */
    public function update(string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $auteur = Auteur::select($_id);
        return $this->render('update', compact('auteur'));
    }
    
    /**
     * updateValidPostForm
     * Recupere et traite les données recu du formulaire de modification d'un auteur
     * @return string
     */
    public function updateValidPostForm() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        var_dump($_POST, $_FILES);
        die('TODO : updateValidPostForm');
    }
    
    /**
     * delete
     * Permet de supprimer un auteur en bdd
     * @param string $_id
     * @return string
     */
    public function delete(string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // action de suppr un auteur en bdd
        $auteur = Auteur::select($_id);
        $auteur->delete();
        return $this->index();
    }


}