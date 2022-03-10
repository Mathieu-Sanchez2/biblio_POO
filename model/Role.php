<?php

class Role extends Table{

        // stock l'id du role
        public $id;
        // stock le "nom" du role
        public $libelle;

        public function __construct($data = [])
        {
                foreach($data as $attr => $value){
                        if (property_exists('Role', $attr)){
                                $this->$attr = $value;
                        }
                }
        }
}