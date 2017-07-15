<?php

/**
* 	
*/
class Consoleclient
{
	public static function debugmessage($method, $class = "undefined", $function = "undefined", $line = "undefined", $content = "empty") 
	{	
		if(DEBUG) {
			if($method == "get") {
				echo "<script>console.log('" . "Class:" . $class . " Function:" . $function . " Line:". $line . " Content:" . $content . "');</script>";
			}else if($method == "post") {
				echo "Class:" . $class . " Function:" . $function . " Line:". $line . " Content:" . $content;
			}
		}
	}

	public static function message($data) {
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
}