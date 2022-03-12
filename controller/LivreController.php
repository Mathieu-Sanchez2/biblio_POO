<?php

class LivreController extends Controller{

    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        // on utilise parent::__construct() pour utiliser le constructeur du parent (ici Controller.php)
        // Ici cela nous sert a récuperer l'etat de la connexion (vrai ou faux) grâce a l'appel dans le constructeur de Controller.php
        parent::__construct();
        $this->path_view = 'view/livre/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * Permet de recuperer les informations nécessaire a l'affichage de l'index et de retourner la vue
     * @return string
     */
    public function index() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // verif si l'user peut voir la page ou pas
        // doit demander au model livre de recup les livres en BDD
        if (!Utilisateur::isConnect()){
            // redirection vers l'index du site web
            return (new SiteController())->render('index');
            // redirection vers le login de l'admin
            // (new AdminController())->render('login');
        }
        $livres = Livre::select();
        // var_dump($livres);
        // var_dump(compact('livres', 'salut'));
        return $this->render('index', compact('livres'));
        // + render la bonne vue avec le HTML qui permet de generer la liste
    }
    
    /**
     * add
     * Permet de retourner la vue pour la page add qui permet d'ajouter un livre en bdd
     * @return string
     */
    public function add() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // retourne la vue qui contient le formulaire pour ajouter un livre en bdd
        return $this->render('add');
    } 

    /**
     * addValidPostForm
     * Permet de valider les données reçu depuis le formulaire d'ajout et apres validation d'ajouter en bdd
     * @return string
     */
    public function addValidPostForm() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // Permet de valider les données recu du formulaire d'ajout et de faire l'insertion en BDD
        // var_dump($_POST);
        $livre = new Livre($_POST);
        // var_dump($livre);
        if($livre->insert()){
            // avec message d'information oui||non ? compact() ?
            return $this->index();
        }else{
            // avec message d'information oui||non ? compact() ?
            return $this->add();
        }
    }
        
    /**
     * update
     * Permet d'afficher le formulaire de modification avec les informations stocker en bdd
     * @param  string $_id
     * @return string
     */
    public function update (string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // retourne la vue qui contient le formulaire de modification
        $livre = Livre::select($_id);
        // var_dump($livre);
        return $this->render('update', compact('livre'));
    }
    
    /**
     * updateValidForm
     * Permet de valider les donées reçu du formulaire de modification et de faire l'update en bdd
     * @return string
     */
    public function updateValidForm() : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // Permet de valider les données recu du formulaire de modification et de faire l'update en BDD
        // var_dump($_POST);
        $livre = new Livre($_POST);
        // var_dump($livre);
        if ($livre->update()){
            return $this->index();
        }
        return $this->update($livre->id);
    }
        
    /**
     * single
     * Permet d'afficher la fiche d'un livre
     * @param  string $_id
     * @return string
     */
    public function single(string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        $livre = Livre::select($_id);
        return $this->render('single', compact('livre'));
    }

    /**
     * delete
     * Permet de supprimer un livre en bdd
     * @return string
     */
    public function delete (string $_id) : string {
        if (!$this->connexion){
            // si l'utilisateur n'as pas fait de connexion ont le redirige vers le login de l'administration
            return (new AdminController)->render('login');
        }
        // action de suppr un livre en bdd
        $livre = Livre::select($_id);
        $livre->delete();
        return $this->index();
    }
}