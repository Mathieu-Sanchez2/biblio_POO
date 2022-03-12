<?php 

class EtatController extends Controller {

        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        // on utilise parent::__construct() pour utiliser le constructeur du parent (ici Controller.php)
        // Ici cela nous sert a récuperer l'etat de la connexion (vrai ou faux) grâce a l'appel dans le constructeur de Controller.php
        parent::__construct();   
        $this->path_view = 'view/etat/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * Permet d'afficher la page index du module etat
     * @return string
     */
    public function index() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $etats = Etat::select();
        return $this->render('index', compact('etats'));
    }
    
    /**
     * single
     * Permet d'afficher la fiche d'un etat
     * @param  string $_id
     * @return string
     */
    public function single(string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $etat = Etat::select($_id);
        return $this->render('single', compact('etat'));
    }
    
    /**
     * add
     * Permet d'afficher le formulaire d'ajout d'un etat
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
     * Recupere et traite les données recu du formulaire d'ajout d'un etat
     * @return string
     */
    public function addValidPostForm() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        var_dump($_POST);
        die('addValidPostForm');
    }
    
    /**
     * update
     * Permet d'afficher le formulaire de modification avec les informations d'un etat
     * @param string $_id
     * @return string
     */
    public function update(string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $etat = Etat::select($_id);
        return $this->render('update', compact('etat'));
    }
    
    /**
     * updateValidPostForm
     * Recupere et traite les données recu du formulaire de modification d'un etat
     * @return string
     */
    public function updateValidPostForm() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        var_dump($_POST);
        die('updateValidPostForm');
    }
    
    /**
     * delete
     * Permet de supprimer un etat en bdd
     * @param string $_id
     * @return string
     */
    public function delete(string $_id) : string {
                if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // action de suppr un etat en bdd
        $etat = Etat::select($_id);
        $etat->delete();
        return $this->index();
    }


}