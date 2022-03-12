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
    
    /**
     * getNombreLivres
     * Retourne le nombre de livre lié a un etat
     * @return string
     */
    public function getNombreLivres() : string {
        $sql = 'SELECT COUNT(id_livre) FROM etat_livre WHERE id_etat = ' . $this->id;
        $req = self::getPDO()->query($sql);
        // on retourne directement la valeur
        return $req->fetch(PDO::FETCH_NUM)[0];
    }
}