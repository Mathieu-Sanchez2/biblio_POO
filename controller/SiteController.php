<?php

class SiteController extends Controller {

    // ATTRR


    // METHODES
    public function __construct()
    {
        $this->path_view = 'view/site/';
        $this->path_view_communes = 'view/commun/site/';
    }

    public function index()
    {
        return $this->render('index');
    }

    public function livres()
    {
        $livres = Livre::select();
        return $this->render('livres', compact('livres'));
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function contactValidPostForm()
    {
        var_dump($_POST);
        die('Ok contactValidPostForm');
    }

    public function single($_id)
    {
        $livre = Livre::select($_id);
        $this->render('single', compact('livre'));
    }
    
}