<?php

class Contaeanuncios extends Controller {

    function __construct($_url) {
        parent::__construct();
        Auth::handleLogin();

        array_push($this->view->css,
            'views/contaeanuncios/css/index.css');
        array_push($this->view->js,
            'views/contaeanuncios/js/index.js');
    }
    
    function index() {
        $this->view->title = 'contaeanuncios';
        $this->view->ads = $this->model->getads();

        $this->loadAnotherModel("ad");
        $this->view->listofservices = $this->anotherModel->ad->getlistofservices();

        $this->view->render('header');
        $this->view->render('contaeanuncios/index');    
        $this->view->render('footer');
    }

    /*public function create() 
    {
        // @TODO: Do your error checking!   
        $action = $this->model->create($_POST);

        if($action) {
            Consoleclient::message(array("status" => "1", "message" => "Anúncio criado com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao inserir anúncio"));
        }
    }*/

    /*public function create() 
    {
        // @TODO: Do your error checking!   
        $action = $this->model->create($_POST);

        if($action) {
            Consoleclient::message(array("status" => "1", "message" => "Anúncio criado com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao inserir anúncio"));
        }
    }*/

    /**
     * [get use for API]
     * @return [Object] [description]
     */
    /*public function get()
    {
        // @TODO: Do your error checking!   
        $action = $this->model->get();

        if($action) {
            Consoleclient::message(array("status" => "1", "message" => $action));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Não há anúncio!"));
        }
    }*/
}