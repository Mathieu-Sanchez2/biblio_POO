<?php

class Table {
    // ATTRIBUTS
    // permet de stocker la table sur laquelle nous devont intéragir
    public static $table;
    // permet de stocker l'objet PDO de php
    public static $pdo;

    // stock le nom de la bdd et l'adresse
    const DSN = 'mysql:dbname=bibliotheque_2;host=localhost';
    // stock le nom utilisateur pour la bdd
    const UTILISATEUR = 'bibliotheque';
    // stock le mdp utilisateur pour la bdd
    const MDP = '0dmaSLwNk2d57FXE';


    // METHODES
    
    /**
     * getPDO()
     * Permet d'acceder a l'objet PDO
     * @return PDO
     */
    public static function getPDO() : PDO {
        // INSTANCIATION DE PDO 
        if (self::$pdo == NULL){
            self::$pdo = new PDO(self::DSN, self::UTILISATEUR, self::MDP, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }
        return self::$pdo;
    }
    
    /**
     * getNomTable()
     * permet d'actualiser et/ou de sauvegarder la valeur de l'attr table
     * @return string
     */
    public static function getNomTable() : string {
        self::$table = strtolower(get_called_class());
        return self::$table;
    }
    /**
     * select()
     * Permet de recuperer une ou plusieurs occurence(s) d'une table
     * @return array||Obj
     */
    public static function select($_id = null) {
        if ($_id == null){
            $sql = "SELECT * FROM " . self::getNomTable();
        }else{
            $sql = "SELECT * FROM " . self::getNomTable() . ' WHERE id = ?';
        }
        // var_dump($sql);
        $req = self::getPDO()->prepare($sql);
        $req->execute([$_id]);
        $req->setFetchMode(PDO::FETCH_CLASS, self::getNomTable());
        if ($_id == null){
            return $req->fetchAll();
        }else{
            return $req->fetch();
        }
    }
    
    /**
     * insert()
     * Permet d'ajouter une occurences dans une table
     * @return bool
     */
    public function insert()  : bool {
        //LIVRES
        $class = get_class($this);
        $data = get_object_vars($this);
        if ($class == 'Livre'){
            //TRAITEMENT
            // var_dump($data);
            unset($data['etat'], $data['auteur'], $data['categorie'], $data['editeur']);
        }else if ($class == 'Auteur'){
            unset($data['livre']);
        }

        $drapeauPrepare = [];
        foreach ($data as $key => $value){
            $drapeauPrepare[] = '?';
        }
        $champs = implode(', ', array_keys($data));
        
        $drapeauPrepare = implode(', ', $drapeauPrepare);
        // var_dump($drapeauPrepare);
        $sql = "INSERT INTO " . $this->getNomTable() . " ($champs)
        VALUES ($drapeauPrepare)";
        $req = self::getPDO()->prepare($sql);
        return $req->execute(array_values($data));
    }
    
    /**
     * update()
     * Permet de modifier une occurence dans une table
     * @return bool
     */
    public function update() : bool {
                //LIVRES
                // permet de recuperer la classe qui fait l'appel
                $class = get_class($this);
                // recupere les attr et leurs valeur de l'objet qui fait l'appel
                $data = get_object_vars($this);
                // si l'objet est un livre alors on fait un traitement particulier
                if ($class == 'Livre'){
                    //TRAITEMENT
                    // var_dump($data);
                    unset($data['etat'], $data['auteur'], $data['categorie'], $data['editeur']);
                }
                // var_dump($data);
                // on crée un tableau qui va nous permettre de stocker les infos a preparer pour la requete
                $drapeauPrepare = [];
                // on boucle sur le tableau $data pour genere autant de marqueur qu'il y a d'element dans notre tableau
                foreach ($data as $key => $value){
                    // on genere la chaine de charactère avec champ = ? pour la requete preparer
                    $drapeauPrepare[] = $key . '=?';
                }
                // on supprimer l'id du tableau
                unset($drapeauPrepare[0]);
                // on transforme le tableau en chaine de caractères
                $champs = implode(', ', $drapeauPrepare);
                // on genere la requete SQL
                $sql = "UPDATE " . $this->getNomTable() . " SET $champs
                 WHERE id = ?";
                //  var_dump($sql);
                // on prepare la requete grace a PDO
                $req = self::getPDO()->prepare($sql);
                // on supprimer le champ id du tableau $data
                unset($data['id']);
                // on recupere les valeurs du tableau dans un tableau numérique (pour le prepare avec ? = array numérique)
                $data = array_values($data);
                // on ajoute l'id en dernier element du tableau pour respecter l'ordre des ?
                $data[] = $this->id;
                // on retourne l'execution de la requete
                return $req->execute($data);
    }
    
    /**
     * delete()
     * Permet de supprimer une occurence dans une table
     * @return bool
     */
    public function delete() : bool {
        var_dump($this);
        $sql = 'DELETE FROM ' . $this->getNomTable() . ' WHERE id = ? LIMIT 1';
        var_dump($sql);
        $req = self::getPDO()->prepare($sql);
        return $req->execute([$this->id]);
    }
    
}