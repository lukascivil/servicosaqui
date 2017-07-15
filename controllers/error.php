<?php

class Error extends Controller {

    function __construct() {
        parent::__construct(); 

        array_push($this->view->css,
            'views/error/css/error.css');
    }
    
    function index() {
        $this->view->title = '404 Error';
        $this->view->img = URL . 'views/error/image/404error.png';
        $this->view->msg = 'This page doesnt exist';
        
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}