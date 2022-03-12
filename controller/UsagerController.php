<?php 

class UsagerController extends Controller {

        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {   
        $this->path_view = 'view/usager/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * Permet d'afficher la page index du module usager 
     * @return string
     */
    public function index() : string {
        $usagers = Usager::select();
        return $this->render('index', compact('usagers'));
    }
    
    /**
     * single
     * Permet d'afficher la fiche d'un usager
     * @param  string $_id
     * @return string
     */
    public function single(string $_id) : string {
        $usager = Usager::select($_id);
        return $this->render('single', compact('usager'));
    }
    
    /**
     * add
     * Permet d'afficher le formulaire d'ajout d'un usager
     * @return string
     */
    public function add() : string {
        return $this->render('add');
    }
    
    /**
     * addValidPostForm
     * Recupere et traite les données recu du formulaire d'ajout d'un usager
     * @return string
     */
    public function addValidPostForm() : string {
        var_dump($_POST);
        die('addValidPostForm');
    }
    
    /**
     * update
     * Permet d'afficher le formulaire de modification avec les informations d'un usager
     * @param string $_id
     * @return string
     */
    public function update(string $_id) : string {
        $usager = Usager::select($_id);
        return $this->render('update', compact('usager'));
    }
    
    /**
     * updateValidPostForm
     * Recupere et traite les données recu du formulaire de modification d'un usager
     * @return string
     */
    public function updateValidPostForm() : string {
        var_dump($_POST);
        die('updateValidPostForm');
    }
    
    /**
     * delete
     * Permet de supprimer un usager en bdd
     * @param string $_id
     * @return string
     */
    public function delete(string $_id) : string {
        // action de suppr un livre en bdd
        $livre = Livre::select($_id);
        $livre->delete();
        return $this->index();
    }


}