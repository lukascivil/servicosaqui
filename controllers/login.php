<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();    

        array_push($this->view->js,
            'views/login/js/index.js');
        array_push($this->view->css,
            'views/login/css/index.css');
    }
    
    function index() 
    {    
        session_start();

        if (session::get("loggedIn")) {
            header('location: index');
        }

        //location to index, not login/index
        $this->view->title = 'login';
        
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }
    
    function login()
    {
        $action = $this->model->login($_POST);

        if($action) {
            Consoleclient::message(array("status" => "1", "message" => "Usuário logado com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao logar usuário!"));
        }
    }
    
    function logout()
    {
        $this->model->logout();
        header('location: ' . URL . 'index');
    }

}