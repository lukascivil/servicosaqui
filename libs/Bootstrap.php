<?php

class Bootstrap {

    private $_url = null;
    private $parameter = [];
    private $_controller = null;
    
    private $_controllerPath = 'controllers/'; // Always include trailing slash
    private $_modelPath = 'models/'; // Always include trailing slash
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';
    
    /**
     * Starts the Bootstrap
     * 
     * @return boolean
     */
    public function init()
    {
        // Sets the protected $_url
        $this->_getUrl();

        // Sets the $parameter if exist 
        $this->_getUrlParameter();

        // Load the default controller if no URL is set
        // eg: Visit http://localhost it loads Default Controller
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        $this->_loadExistingController();
        $this->_callControllerMethod();
    }
    
    /**
     * (Optional) Set a custom path to controllers
     * @param string $path
     */
    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/') . '/';
    }
    
    /**
     * (Optional) Set a custom path to models
     * @param string $path
     */
    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/') . '/';
    }
    
    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: error.php
     */
    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }
    
    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: index.php
     */
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }
    
    /**
     * Fetches the $_GET from 'url'
     */
    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * Get parameters like URL/?param1=teste1&param2=teste2
     */
    private function _getUrlParameter()
    {
        $temp = $_GET;
        unset($temp['url']);

        foreach ($temp as $key => $value) {
            $this->parameter[$key] = $value;
        }
    }
    
    /**
     * This loads if there is no GET parameter passed
     */
    private function _loadDefaultController()
    {
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }
    
    /**
     * Load an existing controller if there IS a GET parameter passed
     * 
     * @return boolean|string
     */
    private function _loadExistingController()
    {
        $file = $this->_controllerPath . $this->_url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            //load the required controller and pass URL to __Constructor
            $this->_controller = new $this->_url[0]($this->_url);
            
            //load model if exist
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return false;
        }
    }
    
    /**
     * If a method is passed in the GET url paremter
     * 
     *  http://localhost/controller/method/(param)
     *  url[0]    = Controller
     *  url[1]    = Method
     *  parameter = Param
     */
    private function _callControllerMethod()
    {
        $length = count($this->_url);
        
        // Make sure the url maxlength is 2, Controller/method
        if ($length > 2) {
            echo "error na url";
            $this->_error();
        }

        // Make sure the method we are calling exists
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                echo "metodo nao existe";
                $this->_error();
            }
        }

        /**
         * Only load index if get has length > 1
         */
        // Determine what to load
        switch ($length) {
            case 2:
                //Controller->Method(Param1)
                $this->_controller->{$this->_url[1]}($this->parameter);
                break;
            
            default:
                $this->_controller->index($this->parameter);
                break;
        }
    }
    
    /**
     * Display an error page if nothing exists
     * 
     * @return boolean
     */
    private function _error() {
        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }

}