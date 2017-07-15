<?php

class Regras extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'regras';
        
        //$this->view->render('header');
        $this->view->render('regras/index');    
        //$this->view->render('footer');
    }

    function cafe() {

    }

}