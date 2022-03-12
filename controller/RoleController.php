<?php

class RoleController extends Controller {
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        $this->path_view = 'view/role/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * permet de retourner la vue pour avoir la liste des roles
     * @return string
     */
    public function index() : string {
        $roles = Role::select();
        // var_dump($roles);
        return $this->render('index', compact('roles'));
    }
    
    
    /**
     * single
     * permet d'afficher la vue qui donne les informations sur un role
     * @param  string $_id
     * @return string
     */
    public function single(string $_id) : string {
        $role = Role::select($_id);
        // var_dump($role);
        return $this->render('single', compact('role'));
    }       
    
    /**
     * add
     * Permet d'afficher le formulaire d'ajout d'un role
     * @return string
     */
    public function add() : string {
        return $this->render('add');
    }
        
    /**
     * addValidPostForm
     * Permet de valider les données recu du formulaire d'ajout
     * @return string
     */
    public function addValidPostForm() : string {
        var_dump($_POST);
        die('addValidPostForm');
        return $this->render('add');
    }
    
    /**
     * update
     * Permet de retourner la vue qui contient le formulaire de modification avec les informations bdd
     * @param  string $_id
     * @return string
     */
    public function update(string $_id) : string {
        $role = Role::select($_id);
        return $this->render('update', compact('role'));
    }

    /**
     * updateValidPostForm
     * Permet de valider les données recu du formulaire de modification
     * @return string
     */
    public function updateValidPostForm() : string {
        var_dump($_POST);
        die('updateValidPostForm');
        $role = new Role($_POST);
        $role->update();
        // avec message d'information oui||non ? compact() ?
        return $this->render('update');
    }    
    /**
     * delete
     * Permet de supprimer un role en bdd
     * @param string $_id
     * @return string
     */
    public function delete(string $_id) : string {
        // model pour supprimer ?
        $role = Role::select($_id);
        $role->delete();
        // message d'erreur ?
        return $this->index();
    }
}