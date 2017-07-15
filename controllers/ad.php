<?php

class Ad extends Controller {

    function __construct($_url) {
        parent::__construct();

        if(isset($_url[1]) && ($_url[1] == "getmain" || $_url[1] == "getimage")) {
            // Do something here!
        } else {
            Auth::handleLogin();
        }

        array_push($this->view->css,
            'views/ad/css/ad.css');
        array_push($this->view->js,
            'views/ad/js/ad.js');
    }
    
    function index() {
        $this->view->title = 'ad';

        $this->view->listofservices = $this->model->getlistofservices();

        $this->view->render('header');
        $this->view->render('ad/index');    
        $this->view->render('footer');
    }

    public function create() 
    {   
        // @TODO: Do your error checking!   
        $action = $this->model->create($_POST, $_FILES);

        if ($action) {
            Consoleclient::message(array("status" => "1", "message" => "Anúncio criado com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao inserir anúncio"));
        }
    }

    public function delete() 
    {   
        try {
            $id = $_GET["id"];
        }catch(Exception $err) {

        }

        $action = $this->model->delete($id);

        if ($action) {
            Consoleclient::message(array("status" => "1", "message" => "Anúncio removido com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao remover anúncio"));
        }
    }

    public function update()
    {
        // @TODO: Do your error checking!
        $action = $this->model->update($_POST);

        if ($action) {
            Consoleclient::message(array("status" => "1", "message" => "O anúncio foi alterado com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao atualizar informações do anúncio!"));
        }
    }

    public function getimage($param = [])
    {
        header("Content-Type: image");
        echo $this->model->getimage($param);
    }

    public function get($param)
    {
        $action = $this->model->get($param);

        if ($action) {
            Consoleclient::message(array("status" => "1", "message" => $action));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao encontrar anúncio ou o mesmo não existe"));
        }
    }

    public function getmain($param = [])
    {
        // @TODO: Do your error checking!   
        $action = $this->model->getmain($param);

        if(!empty($action)) {
            Consoleclient::message(array("status" => "1", "message" => $action));
        } else {
            Consoleclient::message(array("status" => "0", "message" => array()));
        }
    }
}