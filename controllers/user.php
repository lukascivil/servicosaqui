<?php

class User extends Controller {

    public function __construct($_url) {
        parent::__construct();

        if ($_url[1] != "create") {
            Auth::handleLogin();
        }
    }
    
    public function index() 
    {    
        Consoleclient::put(__CLASS__, __FUNCTION__, __LINE__, "Load index");
        $this->view->title = 'Users';
        //$this->view->userList = $this->model->userList();
        
        $this->view->render('header');
        $this->view->render('user/index');
        $this->view->render('footer');
    }
    
    public function create() 
    {

        // @TODO: Do your error checking!   
        $action = $this->model->create($_POST);
        
        if($action) {
            Consoleclient::message(array("status" => "1", "message" => "Usuário criado com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao inserir usuário"));
        }
    }
    
    /*public function edit($id) 
    {
        $this->view->title = 'Edit User';
        $this->view->user = $this->model->userSingleList($id);
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }*/
    
    public function update()
    {
        // @TODO: Do your error checking!
        $action = $this->model->update($_POST);

        if ($action) {
            Consoleclient::message(array("status" => "1", "message" => "Informações do usuário foram salvas com sucesso!"));
        } else {
            Consoleclient::message(array("status" => "0", "message" => "Error ao atualizar informações do usuário!"));
        }
    }
    
    /*public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }*/
}