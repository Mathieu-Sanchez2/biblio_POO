<?php 

class Controller {
    // ATTR 
    // permet de stocker le chemin du dossier des vues
    public string $path_view = 'view/';
    // permet de stocker le chemin du dossier des vues communes aux modules 
    public string $path_view_communes = 'view/commun/';

    // METHODES 
    /**
     * render
     *  Permet de rendre une vue, avec possibilité de passer des informations
     * @param  string $vue
     * @param  ?array $data
     * @return string
     */
    public function render(string $vue,?array $data = []) : string {
        // var_dump($data);
        ob_start();
            extract($data);
            include $this->path_view_communes . 'header.php';
            if ($vue != 'login') {
                include $this->path_view_communes . 'menu.php';
            }
            require $this->path_view . $vue . '.php';
            include $this->path_view_communes . 'footer.php';
        return ob_get_contents();
    }

}