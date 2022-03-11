<?php


class Utilisateur extends Table{
    // ATTRS
    public $id;
    public $nom;
    public $prenom;
    public $pseudo;
    public $mail;
    public $mot_de_passe;
    public $num_telephone;
    public $avatar;
    public $adresse;
    public $ville;
    public $code_postal;

    public $role;


    // METHODES
    public function __construct($_data = [])
    {
        foreach($_data as $attr => $value){
            if (property_exists('Utilisateur', $attr)){
                $this->$attr = $value;
            }
        }
        $this->getRole();
    }

    public function getRole(){
        $sql = "SELECT role.id, role.libelle FROM role INNER JOIN role_utilisateur ON role.id = role_utilisateur.id_role WHERE role_utilisateur.id_utilisateur = ?";
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Role');
        $this->role = $req->fetchAll();
    }

    public function login()
    {
        
    }

    public function logout()
    {
        
    }

    public static function getUserWithMail($_mail){
        $sql = "SELECT * FROM utilisateur WHERE mail = ?";
        $req = self::getPDO()->prepare($sql);
        if(!$req->execute([$_mail])){
            return false;
        }
        $req->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        return $req->fetch();
    }

    public static function isConnect()
    {
        if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == true){
            return true;
        }
        return false;
    }
}