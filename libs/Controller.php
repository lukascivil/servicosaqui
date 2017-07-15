<?php

class Controller {

    function __construct() {
        $this->view = new View();

        array_push($this->view->js, 
            'public/js/jquery-3.1.1.min.js',
            'public/materialize/js/materialize.min.js',
            'public/js/jquery.form.min.js',
            'public/js/dynamicmodal.js',
            'public/js/header.js',
            'public/js/populateForm.js',
            'public/js/asynccities.js',
            'public/js/materialize-pagination.js');

        array_push($this->view->css, 
            'public/materialize/css/materialize.min.css',
            'public/css/font-awesome-4.6.3/css/font-awesome.min.css',
            'public/css/header.css');
    }
    
    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'models/') {
        
        $path = $modelPath . $name.'_model.php';
        
        if (file_exists($path)) {
            require $modelPath .$name.'_model.php';
            
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        } else {
            //Consoleclient::debugmessage("post",__CLASS__, __FUNCTION__, __LINE__, "não tem model");
        }     
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadAnotherModel($name, $modelPath = 'models/') {
        
        $path = $modelPath . $name.'_model.php';
        
        if (file_exists($path)) {
            require $modelPath .$name.'_model.php';
            
            if(!property_exists($this, 'anotherModel')) {
                $this->anotherModel = new stdClass();
            }

            $modelName = $name . '_Model';
            $this->anotherModel->$name = new $modelName();
        }   
    }
}