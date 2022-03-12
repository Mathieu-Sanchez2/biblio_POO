<?php

class Editeur extends Table {

    public $id;
    public $denomination;
    public $siret;
    public $adresse;
    public $ville;
    public $code_postal;
    public $mail;
    public $numero_tel;

     /**
     * __construct
     *
     * @param  ?array $data
     * @return void
     */
    public function __construct(?array $data = []) {
        foreach($data as $attr => $value){
            if (property_exists('Editeur', $attr)){
                    $this->$attr = $value;
            }
        }
    }
    
    /**
     * getEditions
     * recupere le(s) edition(s) de l'editeur
     * @return void
     */
    public function getEditions() {

    }
}