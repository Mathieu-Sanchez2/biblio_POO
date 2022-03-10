<?php

class LivreController extends Controller{

    public function __construct()
    {
        $this->path_view = 'view/livre/';
        $this->path_view_communes = 'view/commun/admin/';
    }
    
    /**
     * index
     * Permet de recuperer les informations nécessaire a l'affichage de l'index et de retourner la vue
     * @return void
     */
    public function index(){
        // verif si l'user peut voir la page ou pas
        // doit demander au model livre de recup les livres en BDD
        $livres = Livre::select();
        // var_dump($livres);
        // var_dump(compact('livres', 'salut'));
        return $this->render('index', compact('livres'));
        // + render la bonne vue avec le HTML qui permet de generer la liste
    }
    
    /**
     * add
     * Permet de retourner la vue pour la page add qui permet d'ajouter un livre en bdd
     * @return void
     */
    public function add(){
        // retourne la vue qui contient le formulaire pour ajouter un livre en bdd
        return $this->render('add');
    } 

    /**
     * addValidPostForm
     * Permet de valider les données reçu depuis le formulaire d'ajout et apres validation d'ajouter en bdd
     * @return void
     */
    public function addValidPostForm(){
        // Permet de valider les données recu du formulaire d'ajout et de faire l'insertion en BDD
        // var_dump($_POST);
        $livre = new Livre($_POST);
        // var_dump($livre);
        if($livre->insert()){
            $this->index();
        }else{
            $this->add();
        }
    }
        
    /**
     * update
     * Permet d'afficher le formulaire de modification avec les informations stocker en bdd
     * @param  mixed $_id
     * @return voids
     */
    public function update ($_id){
        // retourne la vue qui contient le formulaire de modification
        $livre = Livre::select($_id);
        // var_dump($livre);
        return $this->render('update', compact('livre'));
    }
    
    /**
     * updateValidForm
     * Permet de valider les donées reçu du formulaire de modification et de faire l'update en bdd
     * @return void
     */
    public function updateValidForm() {
        // Permet de valider les données recu du formulaire de modification et de faire l'update en BDD
        // var_dump($_POST);
        $livre = new Livre($_POST);
        // $livre->disponibilite = 0;
        // var_dump($livre);
        if ($livre->update()){
            $this->index();
        }else{
            $this->update($livre->id);
        }
    }
    
    /**
     * delete
     * Permet de supprimer un livre en bdd
     * @return void
     */
    public function delete ($_id) {
        // action de suppr un livre en bdd
        var_dump($this);
        $livre = Livre::select($_id);
        var_dump($livre);
        $livre->delete();
        return $this->index();
    }
}