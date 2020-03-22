<?php

if (! function_exists("view")) {
	/*
	* function view is for routing,
	* it sets view path and data 
	*/
	function view(string $str,array $var = [])
	{
		$view = new stdClass;
		$view->path = preg_replace("/\./", "/", $str);
		if (count($var) > 0) {
			$view->data = $var;
		}
		return $view;
	}
}

if (! function_exists("E404")) {
	/*
	* Error 404 when page not found..
	*/
	function E404()
	{	
		header("HTTP/1.0 404 Not Found");
		die();
	}
}