<?php


class Auteur extends Table {

    public $id;
    public $nom;
    public $prenom;
    public $nom_de_plume;
    public $adresse;
    public $ville;
    public $code_postal;
    public $mail;
    public $numero;
    public $photo;

    # stock le(s) livre(s) lié a l'auteur
    public $livre;
    
    /**
     * __construct
     * 
     * @return ?array
     */
    public function __construct(?array $data = []) {
        foreach($data as $attr => $value){
            if (property_exists('Auteur', $attr)){
                    $this->$attr = $value;
            }
        }
    }
    
    /**
     * getLivres
     * Permet de récuperé le(s) livre(s) lié a l'auteur
     * @return void
     */
    public function getLivres() {
        
    }

        /**
     * getSrcPhoto
     * retourne le chemin pour acceder a la photo d'un auteur
     * @return string
     */
    public function getSrcPhoto() : string {
        return 'img/photo/' . $this->photo;
    }
}