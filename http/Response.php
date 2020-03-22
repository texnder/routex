<?php
namespace Routex\http;

use Routex\http\Request;
use aditex\src\Container;
use routex\Exception\httpResponseException;


class Response
{

	/**
	 * httpRequest class Object..
	 *
	 * @var Object..
	 */
	public $httpRequest;

	/**
	 * view file path in application
	 * 
	 * @var string
	 */
	public $viewPath;
	
	public function __construct(Request $request)
	{
		$this->httpRequest = $request->methodObj();
	}

	/**
	 * include file if exist.
	 */
	private function returnView()
	{

		if (is_array($this->httpRequest->data)) {
			 extract($this->httpRequest->data);
		}

		require_once $this->viewPath;
	}

	/**
	 * get views directory path and
	 * match view file exist in 
	 * directory or not
	 *
	 * @param 	string 		$dirname
	 * @param 	string 		$viewPath
	 * @return 	bool 		true or false
	 */
	private function checkViewFileExist($dirname,$viewPath)
	{	
		$this->viewPath = trim($dirname,"/")."/".trim($viewPath,"/").VIEW_FILE_EXT;
		return file_exists($this->viewPath);
	}

	/**
	 * calling controller method specifed in route
	 *
	 * @param 	string 		$controller 
	 * @param 	string 		$controllermethod
	 * @return 	any 		method returned data
	 */
	private function callController($controller, $Method)
	{
		$service = new Container();
		return $service->create($controller)->exec($Method, $_REQUEST);
	}

	/**
	 * get response data for requested url 
	 *
	 * @param 	null
	 * @return 	html page or data
	 */
	public function getResponse()
	{
		
		if (is_string($this->httpRequest->view)) {
			
			if ($this->checkViewFileExist(APP_VIEW,$this->httpRequest->view)) {
				return $this->returnView();
			}else{
				
				throw new httpResponseException("View {$this->httpRequest->view} not exist!!");
			}
		}
		
		elseif (is_string($this->httpRequest->controller) && is_string($this->httpRequest->method)) {
			$data = $this->callController($this->httpRequest->controller,$this->httpRequest->method);
			if (is_object($data)) {
				$view = property_exists($data, "path") ? $data->path : null;
				if ($this->checkViewFileExist(APP_VIEW,$view)) {
					return $this->returnView();
				}else{
					return print_r($data);
				}
			}else{
				return print_r($data);
			}
		}else{
			return print_r($this->httpRequest->callback);
		}
	}


}