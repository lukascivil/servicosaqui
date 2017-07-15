<?php
/**
 *	App Configuration 
 */

// Paths
//$localip = getHostByName(getHostName()) . ":" . $_SERVER['SERVER_PORT'] . "/";
header("Access-Control-Allow-Origin: *");
$localip = "192.168.0.28:81/";
define('URL', 'http://' . $localip); // Always provide a TRAILING SLASH (/) AFTER A PATH
define('LIBS', 'libs/');

// Utils
define('DEBUG', true);
define('SESSION_TIMEOUT', 600);

// DB config
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost:3306'); //servicosaqui.servebeer.com:3306
define('DB_NAME', 'servicosaqui');
define('DB_USER', 'root');
define('DB_PASS', '');