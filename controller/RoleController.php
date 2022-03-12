<?php

class RoleController extends Controller {
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        $this->path_view = 'view/role/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * permet de retourner la vue pour avoir la liste des roles
     * @return void
     */
    public function index(){
        $roles = Role::select();
        // var_dump($roles);
        return $this->render('index', compact('roles'));
    }
    
    
    /**
     * single
     * permet d'afficher la vue qui donne les informations sur un role
     * @param  mixed $_id
     * @return void
     */
    public function single($_id){
        $role = Role::select($_id);
        // var_dump($role);
        return $this->render('single', compact('role'));
    }       
    
    /**
     * add
     * Permet d'afficher le formulaire d'ajout d'un role
     * @return void
     */
    public function add(){
        return $this->render('add');
    }
        
    /**
     * addValidPostForm
     * Permet de valider les données recu du formulaire d'ajout
     * @return void
     */
    public function addValidPostForm(){
        var_dump($_POST);
        die('addValidPostForm');
        return $this->render('add');
    }
    
    /**
     * update
     * Permet de retourner la vue qui contient le formulaire de modification avec les informations bdd
     * @param  mixed $_id
     * @return void
     */
    public function update($_id){
        $role = Role::select($_id);
        return $this->render('update', compact('role'));
    }

    /**
     * updateValidPostForm
     * Permet de valider les données recu du formulaire de modification
     * @return void
     */
    public function updateValidPostForm(){
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
     * @return void
     */
    public function delete(){
        // model pour supprimer ?
        // avec message d'information oui||non ? compact() ?
        return $this->render('index');
    }
}