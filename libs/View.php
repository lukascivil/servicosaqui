<?php

class View {

	public $js = [];
	public $css = [];

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = false)
    {
        require 'views/' . $name . '.php';    
    }

}