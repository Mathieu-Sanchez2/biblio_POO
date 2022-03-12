<?php

class SiteController extends Controller {

    // ATTRR
    

    // METHODES
    public function __construct()
    {
        $this->path_view = 'view/site/';
        $this->path_view_communes = 'view/commun/site/';
    }
    
    /**
     * index
     * Retourne la pge d'index du site web
     * @return void
     */
    public function index() {
        return $this->render('index');
    }
    
    /**
     * livres
     * Retourne la page livres du site web
     * @return void
     */
    public function livres() {
        $livres = Livre::select();
        return $this->render('livres', compact('livres'));
    }
    
    /**
     * contact
     * Retourne la page de contact du site web (formulaire de contact)
     * @return void
     */
    public function contact() {
        return $this->render('contact');
    }

    
    /**
     * contactValidPostForm
     * Recupere et traite les données reçu du formulaire de contact du site web
     * @return void
     */
    public function contactValidPostForm() {
        var_dump($_POST);
        die('contactValidPostForm');
        // traitement des données ?
        // insertion en bdd ?
        // message d'erreur ou de validation ?
        return $this->render('contact');
    }
    
    /**
     * single
     * Retourne la page single du site web (fiche d'un livre)
     * @param  mixed $_id
     * @return void
     */
    public function single($_id)
    {
        $livre = Livre::select($_id);
        $this->render('single', compact('livre'));
    }
    
}