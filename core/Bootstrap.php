<?php
namespace App;

class Bootstrap
{
	private $_url = null;
	private $_controller = null;
	private $_controllerPath = "controllers/";
	private $_modelPath = "models/";
	private $_errorFile = "error.php";
	private $_defaultFile = "index.php";

	public function init()
	{		
		// Set the protected $_url
		$this->_getUrl();

		// Load the default controller if no URL is set
		if (empty($this->_url[0]))
		{
			$this->_loadDefaultController();
			return false;
		}

		$this->_loadExistingController();
		$this->_callControllerMethod();
	}

	public function setModelPath($path)
	{
		$this->_modelPath = trim($path, '/') . '/';
	}

	public function setControllerPath($path)
	{
		$this->_controllerPath = trim($path, '/') . '/';
	}

	public function setErrorFile($path)
	{
		$this->_errorFile = trim($path, '/');
		return false;
	}

	public function setDefaultFile($path)
	{
		$this->_defaultFile = trim($path, '/');
	}

	private function _getUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}

	private function _loadDefaultController()
	{
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new \Controllers\Index;
		$this->_controller->index();
	}	

	private function _loadExistingController()
	{
		$file = $this->_controllerPath . $this->_url[0] . '.php';

		if(file_exists($file)){
			require $file;

			$loadClass = "\Controllers" . "\\" . $this->_url[0];
			# $this->_controller = new $this->_url[0];
			$this->_controller = new $loadClass;
			
			$this->_controller->loadModel($this->_url[0], $this->_modelPath);
		} else {
			$this->_error();
			return false;
		}
	}

	private function _error()
	{
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new \Controllers\Error;
		$this->_controller->index();
		exit;
	}

	private function _callControllerMethod()
	{
		// http://localhost/controller/method/(param)/(param)
		// url[0] - Controller
		// url[1] - Method
		// url[2] - Params
		// url[3] - Params
		// url[4] - Params
		$length = count($this->_url);

		if($length > 1){
			if(!method_exists($this->_controller, $this->_url[1])){
				$this->_error();
			}
		}

		switch ($length) {
			case 5:
				// Controller->Method(Param1, Param2, Param3)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;
			case 4:
				// Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;
			case 3:
				// Controller->Method(Param1)
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			case 2:
				// Controller->Method()
				$this->_controller->{$this->_url[1]}();
				break;
			default:
				$this->_controller->index();
				break;
		}
	}
}