<?php

class Usager extends Table {

    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    public $code_postal;
    public $mail;

        /**
     * __construct
     * 
     * @return ?array
     */
    public function __construct(?array $data = []){
        foreach($data as $attr => $value){
            if (property_exists('Usager', $attr)){
                    $this->$attr = $value;
            }
        }
    }

    
    /**
     * getLocations
     * Retourne les locations lié a l'usager
     * @return void
     */
    public function getLocations() {
        
    }
}