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
    
    /**
     * getNombreLivres
     * Retourne le nombre de livre lié a une catégorie
     * @return string
     */
    public function getNombreLivres() : string {
        $sql = 'SELECT COUNT(id_livre) FROM categorie_livre WHERE id_categorie = ' . $this->id;
        $req = self::getPDO()->query($sql);
        // var_dump($req->fetch(PDO::FETCH_NUM));
        // var_dump($req->fetch(PDO::FETCH_NUM)[0]);
        // on retourne directement la valeur
        return $req->fetch(PDO::FETCH_NUM)[0];
    }
}