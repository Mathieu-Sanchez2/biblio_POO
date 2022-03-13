<?php

/**
 * LienHelper
 */
class LienHelper {
    // ATTRR
    public static $url = "http://localhost/biblio_POO/index.php";

    // METHODES    
    /**
     * getLien
     * Permet de generer facilement une URL
     * @param  string $_controller
     * @param  string $_methode
     * @param  ?string $_id
     * @return string
     */
    public static function getLien(string $_controller, string $_methode, ?string $_id = null) : string {
        if ($_id != null) {
            return self::$url . "?controller=$_controller&methode=$_methode&id=$_id";
        }
        return self::$url . "?controller=$_controller&methode=$_methode";
    }

}