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
     * @return string
     */
    public function index() : string {
        return $this->render('index');
    }
    
    /**
     * livres
     * Retourne la page livres du site web
     * @return string
     */
    public function livres() : string {
        $livres = Livre::select();
        return $this->render('livres', compact('livres'));
    }
    
    /**
     * contact
     * Retourne la page de contact du site web (formulaire de contact)
     * @return string
     */
    public function contact()  : string {
        return $this->render('contact');
    }

    
    /**
     * contactValidPostForm
     * Recupere et traite les données reçu du formulaire de contact du site web
     * @return string
     */
    public function contactValidPostForm() : string {
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
     * @param  string $_id
     * @return string
     */
    public function single(string $_id) : string {
        $livre = Livre::select($_id);
        return $this->render('single', compact('livre'));
    }
    
}