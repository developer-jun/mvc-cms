<?php

namespace App;

use App\Template;

// http://beta.test/myMVC/blog/post/1
// URL_BASE_ADDRESS   /[Controller]/[Method]/[Params]

// http://beta.test/myMVC/blog/posts/p:1/s:title/sd:desc
// URL_BASE_ADDRESS   /[Controller]/[Method]/[Params p: page_number]/[Params s: sort_by]/[Params sd: sort_direction]


// Extract controller name from URL, so that can be map it's corresponding page template
class Controller 
{
    const CONTROLLER_SUFFIX 	= 'Controller';	
	const CONTROLLER_NAMESPACE 	= '\Controllers';
	// const DEFAULT_CONTROLLER 	= 'Home';

	private $default_controller = 'PageController';
	private $default_method 	= 'index';
	private $controller_object 	= null;	
	private $url_nodes			= [];    
	private $params 			= [];	
	
	// extract the controller, methods, and params from the URL
	public function __construct() {

		// $this->extractURLNodes();
		$this->extractParams();			
		$this->extractControllerName();
		//$this->extractMethodName();

		/*
		// make sure controller file if exists
		if (file_exists(ROOT_DIR.'/controllers/' . ucwords($this->url_nodes[0]) . 'Controller.php')) {
			$this->controller = ucwords($url[0]).self::CONTROLLER_SUFFIX;
			unset($url[0]);
		} else {			
			// satisfy the case for: /about is the same as /home/about
			// for home controller, the controller name is not required hence we need include additional logic around it.
			// at this point the result is either be a 404 or a method inside the home controller.
			if(method_exists(CONTROLLER_NAMESPACE.'\\'.$this->controller, $url[0])) {
				$this->method = $url[0];
				unset($url[0]);
			} else {
				// Currently, handles the Page not found
				$this->controller = 'PageNotFound'.self::CONTROLLER_SUFFIX;

				// DO PERMALINK CHECK HERE
				// but if we have other means like a CMS where permalinks are dynamic, we first need to query the database if the page name exists.
				
			}
		}

		// Two ways to trigger our controller
		// 1. Include the controller file - // require_once APP_ROOT.'/controllers/' . $this->_controller . '.php';
		// 2. Autoload the controller class - take advantage of the PSR-4 autoloader by simply calling the class method.
		$this->controller = CONTROLLER_NAMESPACE.'\\'.$this->controller;		
		$this->controller = new $this->controller;
		*/

		/*
		// Check, if the method is included in the URL
		if(isset($url[1])) {
			// Check, if method exists inside the controller class
			if(method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
			*/

		// lastly, the params
		// $this->params = $url ? array_values($url) : array();

		//call_user_func_array(array($this->_controller, $this->_method), $this->_params); // moved to run() method for readability
	}

	public function run() {
		echo '<br />[Params]<br />';
		var_dump($this->params);
		call_user_func_array([$this->controller_object, $this->params['method']], $this->params);
	}
	
	// we have sets of rules for some particular params
	// 	p:1 - page number: integer
	// 	s:title - sort by: string
	// 	sd:desc - sort direction: string
	private function extractParams() {
		$this->url_nodes = $this->getURLNodes();
		// Extract Controller and Method safely
		$this->params['controller'] = isset($this->url_nodes[0]) && !empty($this->url_nodes[0]) ? ucwords($this->url_nodes[0]) : $this->default_controller;
		$this->params['method'] = isset($this->url_nodes[1]) && !empty($this->url_nodes[1]) ? $this->url_nodes[1] : $this->default_method;

		$variable_params = [];
		for ($i = 1; $i < count($this->url_nodes); $i++) {  // Start from index 1 (after controller, as for the method, we can just include it then remove it from the list if it's a valid method) 
			if (preg_match('/^(\w+):(.+)$/', $this->url_nodes[$i], $matches)) {
				$key = $matches[1];    // e.g., 'p', 's', 'sd'
				$value = $matches[2];  // e.g., '1', 'title', 'desc'
				$this->params[$key] = $value;
			} else {
				// if keyword (p:, s:, sd:) is not found, then it is a normal parameter, set it a different key for further use
				$variable_params[] = $this->url_nodes[$i];
			}
		}
		
		if(!empty($variable_params)) {
			$this->params['variable'] = $variable_params;
		}		
	}

	private function getParams() {
		return !empty($this->url_nodes) ? array_values($this->url_nodes) : [];
	}

	private function extractMethodName() {
		// Check, if the method is included in the URL
		if(isset($this->params['method'])) {
			// Check, if method exists inside the controller class
			if(method_exists($this->controller_object, $this->params['method'])) {
				$this->method = $this->params['method'];
				//unset($this->url_nodes[1]);
			}
		}
	}
	
	private function extractMethodName2() {
		// Check, if the method is included in the URL
		if(isset($this->url_nodes[1])) {
			// Check, if method exists inside the controller class
			if(method_exists($this->controller_object, $this->url_nodes[1])) {
				$this->method = $this->url_nodes[1];
				unset($this->url_nodes[1]);
			}
		}
	}

	private function extractControllerName2() {
		$controller = $this->controller;
		//echo ROOT.'/Controllers/' . ucwords($this->url_nodes[0]) . 'Controller.php';
		//var_dump(file_exists(ROOT_DIR . '/Controllers/' . ucwords($this->url_nodes[0]) . 'Controller.php'));
		$controller_file = ROOT_DIR . '/Controllers/' . ucwords($this->url_nodes[0]) . self::CONTROLLER_SUFFIX . '.php';
		echo '<br />Controller: ['. $controller_file .']<br />';
		var_dump(file_exists($controller_file));
		// make sure controller file if exists
		if (file_exists($controller_file)) {
			$controller = ucwords($this->url_nodes[0]). self::CONTROLLER_SUFFIX;
			var_dump($this->url_nodes);
			unset($this->url_nodes[0]);
			echo 'removing controller name from params';
			var_dump($this->url_nodes);
		} else {

			$home_controller = ucwords($controller);
			echo '['. $home_controller . '::'. $this->url_nodes[0] .']';
			// satisfy the case for: /about = /home/about
			// for home controller, the controller name is not required hence we need include additional logic around it.
			// at this point the result is either be a 404 or a method inside the home controller.
			if(method_exists(self::CONTROLLER_NAMESPACE . '\\' . $home_controller, $this->url_nodes[0])) {
				$this->method = $this->url_nodes[0];
				unset($this->url_nodes[0]);
			} else {
				// if we have dynamic routes stored in the database, 
				// we can use this section to check if the route exists and get the controller name

				// Currently, handles the Page not found
				$controller = 'PageNotFound'.self::CONTROLLER_SUFFIX;

				// DO PERMALINK CHECK HERE
				// but if we have other means like a CMS where permalinks are dynamic, we first need to query the database if the page name exists.
				
			}
		}

		// Two ways to trigger our controller
		// 1. Include the controller file - // require_once APP_ROOT.'/controllers/' . $this->_controller . '.php';
		// 2. Autoload the controller class - take advantage of the PSR-4 autoloader by simply calling the class method.
		$controller = self::CONTROLLER_NAMESPACE.'\\'.$controller;	
		echo '<br />['.$controller.']';	
		$this->controller_object = new $controller($this->getParams()); // new HomeController
	}

	private function extractControllerName() {
		$controller_file = ROOT_DIR . '/Controllers/' . $this->params['controller'] . self::CONTROLLER_SUFFIX . '.php';
		echo '<br />Controller: ['. $controller_file .']<br />';
		var_dump(file_exists($controller_file));
		// if controller file does not exists, then find other ways to find the controller
		//   1. $this->params['controller'] might not be the controller name, but the method name (/about = PageController::about)
		//   2. if we have a route list on the database or list somewhere, we need to match $this->params['controller'] to that list.
		//   3. It's possible that the request is a typo and we need to gracefully handle it to PageNotFoundController
		if (!file_exists($controller_file)) {	
			echo "<br />". $this->params['controller'] . self::CONTROLLER_SUFFIX . ' - does not exists, trying other methods<br />';
			echo '<br /> Checking default controller: ['. $this->default_controller . ']<br />';
			// echo '['. $this->default_controller . '::'. $this->params['controller'] .']';
			// satisfy the case for: /about = /home/about
			// for home controller, the controller name is not required hence we need include additional logic around it.
			// at this point the result is either be a 404 or a method inside the home controller.
			if(method_exists(self::CONTROLLER_NAMESPACE . '\\' . $this->default_controller, $this->params['controller'])) {
				echo '<br /> It\'s not a controller but rather a METHOD of '. $this->default_controller;
				echo '<br /> Using '. $this->default_controller .'::'. $this->params['controller'];
				//$this->method = $this->params['controller']; // Controller name is the method name
				$this->params['method'] = $this->params['controller'];
				unset($this->url_nodes[0]);
			} else {
				echo '<br /> Controller requested ['. $this->params['controller'] .'] does not exists either';
				echo '<br /> Using PageNotFoundController for graceful exit';
				// if we have dynamic routes stored in the database, 
				// we can use this section to check if the route exists and get the controller name

				// Currently, handles the Page not found
				//$controller = 'PageNotFound'.self::CONTROLLER_SUFFIX;
				$this->params['controller'] = 'PageNotFound'.self::CONTROLLER_SUFFIX;

				// DO PERMALINK CHECK HERE
				// but if we have other means like a CMS where permalinks are dynamic, we first need to query the database if the page name exists.
				
			}
		} else {
			$this->params['controller'] .= self::CONTROLLER_SUFFIX;
			//$controller = $this->params['controller'];
			//$controller = ucwords($this->url_nodes[0]). self::CONTROLLER_SUFFIX;
			//var_dump($this->url_nodes);
			unset($this->url_nodes[0]);
			//echo 'removing controller name from params';
			//var_dump($this->url_nodes);
		}

		// Two ways to trigger our controller
		// 1. Include the controller file - // require_once APP_ROOT.'/controllers/' . $this->_controller . '.php';
		// 2. Autoload the controller class - take advantage of the PSR-4 autoloader by simply calling the class method.
		$controller = self::CONTROLLER_NAMESPACE.'\\'.$this->params['controller'];	
		$this->controller_object = new $controller($this->getParams()); // new HomeController
	}

	private function getURLNodes() {
		if (!isset($_GET['url'])) {
			return ['Page']; // return the default controller only [Page = PageController]
		}		
		
		$url = trim($_GET['url'], '/'); // Remove leading and trailing slashes for consistency
		$url = filter_var($url, FILTER_SANITIZE_URL); // Sanitize URL string		

		return explode('/', $url); // Convert into array
	}
}