<?php

/**
* 	This Function will work with all html imports
*/
class html
{
	/**
	 * [echoTitle description]
	 * @param  [type] $title [description]
	 * @return [type]        [description]
	 */
	public static function echoTitle($title) 
	{
		echo '<title>' . $title . '</title>';
	}

	/**
	 * [echoAllcssImports description]
	 * @param  [type] $paths [description]
	 * @return [type]        [description]
	 */
	public static function echoAllcssImports($paths) 
	{
		if (isset($paths)) {
			foreach ($paths as $css) {
				echo self::pathToHtmlImport("css", $css);
			}
		}
	}
	
	/**
	 * [echoAlljsImports description]
	 * @param  [type] $paths [description]
	 * @return [type]        [description]
	 */
	public static function echoAlljsImports($paths) 
	{
		if (isset($paths)) {
			foreach ($paths as $js) {
				echo self::pathToHtmlImport("js", $js);
			}
		}
	}

	/**
	 * [pathToHtmlImport description]
	 * @param  [type] $type [description]
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	private static function pathToHtmlImport($type, $path)
	{	
		if ($type == "css")
			return '<link rel="stylesheet" type="text/css" href=' . URL . $path . '>';
		else
			return '<script type="text/javascript" src="' . URL . $path . '"></script>';
	}
}