<?php

class LienHelper {
    // ATTRR


    // METHODES
    public static function getLien($_controller, $_methode, $_id = null) {
        # http://localhost/biblio_POO/index.php?controller=LivreController&methode=index
        # http://localhost/biblio_POO/index.php?controller=LivreController&methode=index&id=1
        if ($_id != null) {
            return "http://localhost/biblio_POO/index.php?controller=$_controller&methode=$_methode&id=$_id";
        }
        return "http://localhost/biblio_POO/index.php?controller=$_controller&methode=$_methode";
        
    }

}