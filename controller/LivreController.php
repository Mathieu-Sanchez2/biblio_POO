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
        $categories = Categorie::select();
        $auteurs = Auteur::select();
        $editeurs = Editeur::select();
        // var_dump($categories, $auteurs);
        // retourne la vue qui contient le formulaire pour ajouter un livre en bdd
        return $this->render('add', compact('categories', 'auteurs', 'editeurs'));
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
        // var_dump($_POST, $_FILES);
        $livre = new Livre($_POST);
        // var_dump($livre);
        // ne pas oublié d'indiquer l'illustration car c'est $_FILES et pas $_POST qui a l'info
        $livre->illustration = $_FILES['illustration']['name'];
        // var_dump($livre);
        // *** TRAITEMENT DE L'IMAGE ***
        // on passe $_FILES pour que la fonction récupere les données du formulaire
        if (!Livre::addIllustrationOnDir($_FILES)) {
            // erreur : illustration non déplacé
            // die('Controller : deplacement illustration nok');
            // avec message d'information oui||non ? compact() ?
            return $this->add();
        };
        // TODO :: VOIR beginTransaction de PDO pour le requetage
        if(!$livre->insert()){
            // erreur ajout : redirection avec message d'information oui||non ? compact() ?
            return $this->add();
        }
        // on stock l'id créer en base de données dans l'attribut id de l'objet livre
        $livre->id = Livre::getPDO()->lastInsertId();
        // var_dump($livre);
        // on lie l'état neuf lors de l'ajout par defaut (champs chaché dans le formulaire)
        if(!$livre->addEtatToLivre()){
            // erreur ajout catégorie : redirection avec message d'information
            // die('Controller : add etat nok');
            return $this->add();
        }
        // on lie les catégories sélectionnés depuis le formulaire
        if(!$livre->addCategorieToLivre()){
            // erreur ajout catégorie : redirection avec message d'information
            // die('Controller : add categorie nok');
            return $this->add();
        }
        // on lie les auteur sélectionnés depuis le formulaire
        if(!$livre->addAuteurToLivre()){
            // erreur ajout auteur : redirection avec message d'information
            // die('Controller : add auteur nok');
            return $this->add();
        }
        // on lie la maison d'édition sélectionné depuis le formulaire
        if(!$livre->addEditionToLivre()){
            // erreur ajout edition : redirection avec message d'information
            // die('Controller : add edition nok');
            return $this->add();
        }
        // on redirige sur la fiche du livre
        return $this->single($livre->id);
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
        $livre = new Livre($_POST);
        var_dump($livre, $_FILES);
        // si on a un nom et un fichier dans illustration alors on fait le traitement
        if (!empty($_FILES['illustration']['name']) && !empty($_FILES['illustration']['tmp_name'])) {
            // TRAITEMENT DE L'IMAGE
            $livre->illustration = $_FILES['illustration']['name'];
            // on recupere l'ancienne illustration
            $hold_illustration = (Livre::select($livre->id))->illustration;
            // on passe $_FILES pour que la fonction récupere les données du formulaire
            if (!Livre::removeIllustrationOnDir($hold_illustration)) {
                // erreur : illustration non déplacé
                die('suppr illustration nok');
                // avec message d'information oui||non ? compact() ?
                return $this->update($livre->id);
            };
            // on passe $_FILES pour que la fonction récupere les données du formulaire
            if (!Livre::addIllustrationOnDir($_FILES)) {
                // erreur : illustration non déplacé
                die('deplacement illustration nok');
                // on redirige vers la page de modification (avec message?)
                return $this->update($livre->id);
            };
        }
        // on modifie le livre en bdd
        if ($livre->update()){
            // on redirige vers la page d'index (avec message?)
            return $this->index();
        }
        // on redirige vers la page de modification (avec message?)
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