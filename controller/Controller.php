<?php 

class Controller {
    // ATTR 
    // permet de stocker le dossier des vues a utiliser par le controlleur
    public $path_view = 'view/';

    public $path_view_communes = 'view/commun/';

    // METHODES 
    /**
     * render
     *  Permet de rendre une vue, avec possibilité de passer des informations
     * @param  mixed $vue
     * @param  mixed $data
     * @return void
     */
    public function render($vue, $data = []) {
        // var_dump($data);
        ob_start();
            extract($data);
            include $this->path_view_communes . 'header.php';
            include $this->path_view_communes . 'menu.php';
            require $this->path_view . $vue . '.php';
            include $this->path_view_communes . 'footer.php';
        return ob_get_contents();
    }

}