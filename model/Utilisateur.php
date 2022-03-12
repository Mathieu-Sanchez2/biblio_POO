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
    public function __construct($_data = []) {
        foreach($_data as $attr => $value){
            if (property_exists('Utilisateur', $attr)){
                $this->$attr = $value;
            }
        }
        // on recupere les roles de l'utilisateur
        $this->getRole();
    }
    
    /**
     * getRole
     * récupere le/les role(s) de l'utilisateur en bdd et l'enregistre dans l'attribut role
     * @return array
     */
    public function getRole() : array {
        $sql = "SELECT role.id, role.libelle FROM role INNER JOIN role_utilisateur ON role.id = role_utilisateur.id_role WHERE role_utilisateur.id_utilisateur = ?";
        $req = self::getPDO()->prepare($sql);
        $req->execute([$this->id]);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Role');
        return $this->role = $req->fetchAll();
    }
    
    /**
     * login
     * Permet de créer une connexion pour un utilisateur a l'administration si le mot de passe est celui enregistrer en bdd
     * @param  mixed $_mot_de_passe
     * @return void
     */
    public function login(string $_mot_de_passe) : bool {
        // on vérifie le mot de passe du formulaire a celui enregistré en bdd
        if (!password_verify($_mot_de_passe, $this->mot_de_passe)){
            # ERREUR : le mdp ne correspond pas
            $_SESSION['error_form_login'] = true;
            return false;
        }
        // on initialise la connexion : 
        // on enregistre l'utilisateur connecté sous forme de chaine de caractère
        $_SESSION['utilisateur'] = serialize($this);
        // on accorde la connexion
        $_SESSION['connexion'] = true;
        // on retourne true
        return true;
    }
    
    /**
     * logout
     * Detruit la session d'un utilisateur
     * @return bool
     */
    public function logout() : bool {   
        // $_SESSION = [];
        return session_destroy();
    }
    
    /**
     * getUserWithMail
     *  Permet voir si un utilisateur existe en base de données par rapport a une adresse mail
     * @param  string $_mail (le mail a chercher)
     * @return ?Utilisateur
     */
    public static function getUserWithMail(string $_mail) : ?Utilisateur {
        $sql = "SELECT * FROM utilisateur WHERE mail = ?";
        $req = self::getPDO()->prepare($sql);
        if(!$req->execute([$_mail])){
            return NULL;
        }
        $req->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        return $req->fetch();
    }
    
    /**
     * isConnect
     *  Permet de savoir si un utilisateur est connecté ou pas
     * @return bool
     */
    public static function isConnect() : bool {
        if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == true){
            return true;
        }
        return false;
    }
}