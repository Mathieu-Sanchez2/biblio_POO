<?php


class Categorie extends Table{

    public $id;

    public $libelle;

    /**
     * __construct
     *
     * @param  ?array $data
     * @return void
     */
    public function __construct(?array $data = []) {
        foreach($data as $attr => $value){
            if (property_exists('Categorie', $attr)){
                    $this->$attr = $value;
            }
        }
    }
    
    /**
     * getLivres
     * retourne les livres liés a une catégorie
     * @return void
     */
    public function getLivres() {
        
    }
}