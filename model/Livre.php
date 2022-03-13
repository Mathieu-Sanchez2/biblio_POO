<?php 

class Livre extends Table{
    // ATTRIBUTS (caractéristiques)
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
    

    // METHODES (actions)
    
    /**
     * __construct
     * Permet d'attribuer les valeurs dans les attributs lors de l'instanciation
     * @param  ?array $data
     * @return void
     */
    public function __construct(?array $data = []) {
        foreach($data as $attr => $value){
            if (property_exists('Livre', $attr)){
                $this->$attr = $value;
            }
        }
        if ($this->id != null){
            $this->getAuteurs();
            $this->getCategories();
            $this->getEditeurs();
            $this->getEtat();
        }
    }
    
    /**
     * getAuteurs
     * recupere une liste d'un ou plusieurs auteur qui sont liés a un livre
     * @return array
     */
    public function getAuteurs() : array {
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
     * @return array
     */
    public function getCategories() : array {
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
     * @return array
     */
    public function getEditeurs() : array {
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
    public function getEtat() {
        $sql = 'SELECT etat.id, etat.libelle FROM etat_livre INNER JOIN etat ON etat_livre.id_etat = etat.id WHERE etat_livre.id_livre = ?';
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Etat');
        $this->etat = $req->fetch();
        return $this->etat;
    }

    /**
     * getDisponibilite
     * Retourne une chaine de caractères par rapport a la valeur stocker dans disponibilité
     * @return string
     */
    public function getDisponibilite() : string {
        if ($this->disponibilite == 0){
            return 'Disponible';
        }
        return 'En location';
    }
    
    /**
     * getSrcIllustration
     * retourne le chemin pour acceder a l'illustration d'un livre
     * @return string
     */
    public function getSrcIllustration() : string {
        return 'img/illustration/' . $this->illustration;
    }
    
    /**
     * addIllustration
     * Permet d'ajouter une illustration dans le dossier img/illustration/
     * @param  array $_files
     * @return bool
     */
    public static function addIllustrationOnDir(array $_files) : bool {
        // GESTION DE L'ILLUSTRATION
        // on enregistre le nom de l'illustration
        $illustration  = $_files['illustration']['name'];
        // on enregistre le type (l'extension)
        $illustration_type  = $_files['illustration']['type'];
        // on enregistre l'endroit ou est le fichier a récuperer
        $dossier_temporaire  = $_files['illustration']['tmp_name'];
        // on enregistre l'endroit de destination
        $dossier_destination  = 'img/illustration/' . $illustration;
        // on deplace l'illustration dans le dossier de destination
        if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){
            // erreur illustration non déplacé
            return false;
        }
        // img bien déplacé
        return true;
    }

     /**
     * removeIllustration
     * Permet d'ajouter une illustration dans le dossier img/illustration/
     * @param  mixed $_files
     * @return string
     */
    public static function removeIllustrationOnDir(string $_files) : bool {
        $chemin_illustration = 'img/illustration/' . $_files;
        // si l'illustration existe
        if (is_file($chemin_illustration)){
            // on supprime l'illustration       
            if (unlink($chemin_illustration)){
                // img bien suppr
                return true;
            }
        }
        // erreur dans la suppresion de l'illustration
        return false;
    }
    
    /**
     * addCategorieToLivre
     * Lie un livre a une ou plusieurs catégorie(s) en bdd
     * @return bool
     */
    public function addCategorieToLivre() : bool {
        foreach ($this->categorie as $categorie){
            $sql = "INSERT INTO categorie_livre VALUES (:id_categorie, :id_livre)";
            $req = self::getPDO()->prepare($sql);
            if (!$req->execute([':id_categorie' => $categorie, ':id_livre' => $this->id])) {
                var_dump($req->errorInfo());
                die('Error info categorie');
                return false;
            }
        }
        return true;
    }
    
    /**
     * addAuteurToLivre
     * Lie un livre a un ou plusieurs auteur en bdd
     * @return bool
     */
    public function addAuteurToLivre() : bool {
        if ($this->auteur != null) {
            foreach ($this->auteur as $auteur){
                $sql = "INSERT INTO auteur_livre VALUES (:id_auteur, :id_livre, NULL)";
                $req = self::getPDO()->prepare($sql);
                if (!$req->execute([':id_auteur' => $auteur, ':id_livre' => $this->id])) {
                    var_dump($req->errorInfo());
                    die('Error info auteur');
                    return false;
                }
            }
        }
        return true;
    }

     /**
     * addEtatToLivre
     * lie un livre a un etat en bdd
     * @return bool
     */
    public function addEtatToLivre() : bool {
        $sql = "INSERT INTO etat_livre VALUES (:id_livre, :id_etat)";
        $req = self::getPDO()->prepare($sql);
        if (!$req->execute([':id_livre' => $this->id, ':id_etat' => $this->etat])){
            var_dump($req->errorInfo());
            die('Error info etat');
            return false;
        }
        return true;
    }

     /**
     * addEditionToLivre
     * lie un livre a une maison d'édition en bdd
     * @return bool
     */
    public function addEditionToLivre() : bool {
        if ($this->editeur != null) {
            foreach ($this->editeur as $editeur){
                $sql = "INSERT INTO editeur_livre VALUES (:id_editeur, :id_livre, NULL, NULL)";
                $req = self::getPDO()->prepare($sql);
                if (!$req->execute([':id_editeur' => $editeur,':id_livre' => $this->id])) {
                    var_dump($req->errorInfo());
                    die('Error info editeur');
                    return false;
                }
            }
        }
        return true;
    }
}