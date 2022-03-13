<?php 


/**
 * ImgHelper
 * Permet de gerer les actions des images dans une application
 */
class ImgHelper {
    
    public $image;
    public $type;
    public $poids;
    
    /**
     * __construct
     *
     * @param  mixed $data
     * @return void
     */
    public function __construct(array $data = []) {
        foreach($data as $attr => $value){
            if (property_exists('ImgHelper', $attr)){
                    $this->$attr = $value;
            }
        }
    }
    
    /**
     * addImgOnDirectory
     * Permet de stocker une image dans le dossier img de l'application
     * @param  array $_fichier
     * @param  string $_dossier_destination
     * @return bool
     */
    public static function addImgOnDirectory(array $_fichier, string $_dossier_destination) : bool {
        // GESTION D'UNE IMAGE
        // var_dump($_fichier);
        // on enregistre le nom de l'image
        $illustration  = $_fichier[$_dossier_destination]['name'];
        // on enregistre le type (l'extension)
        $illustration_type  = $_fichier[$_dossier_destination]['type'];
        // on enregistre l'endroit ou est l'image a récuperer
        $dossier_temporaire  = $_fichier[$_dossier_destination]['tmp_name'];
        // on enregistre l'endroit de destination
        $dossier_destination  = 'img/' . $_dossier_destination . '/' . $illustration;
        // on deplace l'illustration dans le dossier de destination
        if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){
            // erreur illustration non déplacé
            return false;
        }
        // img bien déplacé
        return true;
    }
    
    /**
     * removeImgOnDirectory
     * Permet de supprimer une image dans le dossier img de l'application
     * @param  mixed $_nom_fichier
     * @param  mixed $_dossier
     * @return bool
     */
    public static function removeImgOnDirectory(string $_nom_fichier, string $_dossier) : bool {
        $chemin_image = 'img/' . $_dossier . '/' . $_nom_fichier;
        // si l'image existe
        if (is_file($chemin_image)){
            // on supprime l'image       
            if (unlink($chemin_image)){
                // img bien suppr
                return true;
            }
        }
        // erreur dans la suppresion de l'illustration
        return false;
    }
    
}