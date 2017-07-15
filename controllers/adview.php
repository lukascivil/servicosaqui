<?php

class Adview extends Controller {

    function __construct($_url) {
        parent::__construct();

        /*if(isset($_url[1]) && ($_url[1] == "getmain" || $_url[1] == "getimage")) {
            // Do something here!
        } else {
            Auth::handleLogin();
        }*/

        array_push($this->view->css,
            'views/adview/css/index.css');
        array_push($this->view->js,
            'views/adview/js/index.js');
    }
    
    function index($post_data) 
    {
        $this->view->title = 'adview';
        $this->view->adview = $this->model->getadview($post_data);

        $this->view->render('header');
        $this->view->render('adview/index');
        $this->view->render('footer');
    }
}