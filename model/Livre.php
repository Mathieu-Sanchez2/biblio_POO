<?php 

class Livre extends Table{
    // ATTRS    
    public $id;
    public $num_ISBN;
    public $titre;
    public $illustration;
    public $resume;
    public $prix;
    public $nb_pages;
    public $date_achat;
    public $disponibilite;
    public $etat;
    public $auteur;
    public $categorie;
    public $editeur;
    

    // METHODES    
    /**
     * __construct
     * Permet d'attribuer les valeurs dans les attributs lors de l'instanciation
     * @return void
     */
    public function __construct($data = []){
        foreach($data as $attr => $value){
            if (property_exists('Livre', $attr)){
                $this->$attr = $value;
            }
        }
        // if ($this->id != null){
        //     $this->getAuteurs();
        //     $this->getCategories();
        //     $this->getEditeurs();
        //     $this->getEtat();
        // }
    }
    
    /**
     * getAuteurs
     * recupere une liste d'un ou plusieurs auteur qui sont liés a un livre
     * @return void
     */
    public function getAuteurs(){
        $sql = 'SELECT * 
        FROM auteur_livre
        INNER JOIN auteur ON auteur_livre.id_auteur = auteur.id 
        WHERE auteur_livre.id_livre = ?';
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $this->auteur = $req->fetchAll(PDO::FETCH_ASSOC);
        return $this->auteur;
    }
    
    /**
     * getCategories
     * recupere une liste d'une ou plusieurs catégorie qui sont liés a un livre
     * @return void
     */
    public function getCategories(){
        $sql = 'SELECT * 
        FROM categorie_livre 
        INNER JOIN categorie ON categorie_livre.id_categorie = categorie.id 
        WHERE categorie_livre.id_livre = ?';
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $this->categorie = $req->fetchAll(PDO::FETCH_ASSOC);
        return $this->categorie;
    }
    
    /**
     * getEditeurs
     * recupere une liste d'un ou plusieurs editeurs qui sont liés au livre
     * @return void
     */
    public function getEditeurs(){
        $sql = 'SELECT *
        FROM editeur_livre 
        INNER JOIN editeur ON editeur_livre.id_editeur = editeur.id 
        WHERE editeur_livre.id_livre = ?';
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $this->editeur = $req->fetchAll(PDO::FETCH_ASSOC);
        return $this->editeur;
    }

        
    /**
     * getEtat
     * Recupere l'etat d'un livre
     * @return void
     */
    public function getEtat(){
        $sql = 'SELECT etat.libelle FROM etat_livre INNER JOIN etat ON etat_livre.id_etat = etat.id WHERE etat_livre.id_livre = ?';
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $this->etat = $req->fetch(PDO::FETCH_ASSOC)['libelle'];
        return $this->etat;
    }

        
    /**
     * getDisponibilite
     * Retourne une chaine de caractères par rapport a la valeur stocker dans disponibilité
     * @return void
     */
    public function getDisponibilite(){
        if ($this->disponibilite == 0){
            return 'Disponible';
        }
        return 'En location';
    }

}
