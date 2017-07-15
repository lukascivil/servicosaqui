<?php

require 'config.php';
require 'util/Auth.php';

function __autoload($class) {
    require LIBS . $class .".php";
}

// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();