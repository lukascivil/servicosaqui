<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();

        array_push($this->view->js,
            'views/index/js/index.js');
        
        array_push($this->view->css,
            'views/index/css/index.css');
    }
    
    function index() {
        $this->view->title = 'index';
        $this->loadAnotherModel("ad");

        $this->view->listofservices = $this->anotherModel->ad->getlistofservices();

        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }
    
}