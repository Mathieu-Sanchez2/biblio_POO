<?php

class Etat extends Table {
    
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
            if (property_exists('Etat', $attr)){
                    $this->$attr = $value;
            }
        }
    }
    
    /**
     * getLivre
     * Retourne la liste des livres lié a l'etat
     * @return void
     */
    public function getLivre() {
        
    }
}