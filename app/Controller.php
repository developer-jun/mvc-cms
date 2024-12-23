<?php

namespace App;

//use App\Template;

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
	private $params 			= [];
	private $alias              = [];
	
	
	// extract the controller, methods, and params from the URL
	public function __construct() {
		$this->setAlias([]);
		$this->parseParams();
		$this->initializeRequestedController();

	}

	public function run() {
		call_user_func_array([$this->controller_object, $this->params['method']], []);
	}

	private function setAlias($alias = []) {
		$alias_lists = [
			[
				'controller' => 'PageController',
				'aliases'    => ['home', 'homepage', 'index'],
				'method'     => 'index'
			],
			[
				'controller' => 'PageController',
				'aliases'    => ['company', 'aboutus'],
				'method'     => 'about'
			],
		];
		$this->alias = $alias_lists;
		$this->alias = array_merge($this->alias, $alias);
	}
	
	// we have sets of rules for some particular params
	// 	p:1 - page number: integer
	// 	s:title - sort by: string
	// 	sd:desc - sort direction: string
	private function parseParams() {
		$url_nodes = $this->getURLNodes();
		// Extract Controller and Method safely, but these are only possible values.
		$this->params['controller'] = isset($url_nodes[0]) && !empty($url_nodes[0]) ? ucwords($url_nodes[0]) : $this->default_controller;
		$this->params['method'] = isset($url_nodes[1]) && !empty($url_nodes[1]) ? $url_nodes[1] : $this->default_method;

		$variable_params = [];
		for ($i = 0; $i < count($url_nodes); $i++) {  // Start from index 1 (after controller, as for the method, we can just include it then remove it from the list if it's a valid method) 
			if (preg_match('/^(\w+):(.+)$/', $url_nodes[$i], $matches)) {
				$key = $matches[1];    // e.g., 'p', 's', 'sd'
				$value = $matches[2];  // e.g., '1', 'title', 'desc'
				$this->params['defined'][$key] = $value;
				//$variable_params[$key] = $value;
			} else {
				// if keyword (p:, s:, sd:) is not found, then it is a normal parameter, set it a different key for further use
				$variable_params[] = $url_nodes[$i];
			}
		}
		
		if(!empty($variable_params)) {
			$this->params['variable'] = $variable_params;
		}		
	}

	private function getParams() {
		return !empty($this->params) ? array_values($this->params) : [];
	}	

	private function initializeRequestedController() {
		$controller_file = ROOT_DIR . '/Controllers/' . $this->params['controller'] . self::CONTROLLER_SUFFIX . '.php';
		//echo '<br />Controller: ['. $controller_file .']<br />';
		//var_dump(file_exists($controller_file));
		// if controller file does not exists, then find other ways to find the controller
		//   1. $this->params['controller'] might not be the controller name, but the method name (/about = PageController::about)
		//   2. if we have a route list on the database or list somewhere, we need to match $this->params['controller'] to that list.
		//   3. It's possible that the request is a typo and we need to gracefully handle it to PageNotFoundController
		if (!file_exists($controller_file)) {	
			//echo "<br />". $this->params['controller'] . self::CONTROLLER_SUFFIX . ' - does not exists, trying other methods<br />';
			//echo '<br /> Checking default controller: ['. $this->default_controller . ']<br />';
			if(method_exists(self::CONTROLLER_NAMESPACE . '\\' . $this->default_controller, $this->params['controller'])) {
				//echo '<br /> It\'s not a controller but rather a METHOD of '. $this->default_controller;
				//echo '<br /> Using '. $this->default_controller .'::'. $this->params['controller'];
				$this->params['method'] = $this->params['controller'];
				$this->params['controller'] = $this->default_controller;
				//unset($this->url_nodes[0]);
			} else {
				//echo '<br /> Controller requested ['. $this->params['controller'] .'] does not exists either';
				//echo '<br /> Using PageNotFoundController for graceful exit';
				// if we have dynamic routes stored in the database, 
				// we can use this section to check if the route exists and get the controller name

				

				// DO PERMALINK CHECK HERE
				// but if we have other means like a CMS where permalinks are dynamic, we first need to query the database if the page name exists.
				$controller_alias = array_filter($this->alias, function ($item) {
					//return in_array(strtolower($this->params['controller']), $item['aliases']);
					if(in_array(strtolower($this->params['controller']), $item['aliases'])) {
						return $item;
					}

					return;
				});
				if(!empty($controller_alias)) {
					//print_r($controller_alias);
					foreach($controller_alias as $item) {
						$this->params['controller'] = $item['controller'];
						$this->params['method'] = $item['method'];
						break;
					}					
				} else {
					// Currently, handles the Page not found
					$this->params['controller'] = 'PageNotFound'.self::CONTROLLER_SUFFIX;
				}
			}
		} else {
			$this->params['controller'] .= self::CONTROLLER_SUFFIX;
			//unset($this->url_nodes[0]);
		}

		// Two ways to trigger our controller
		// 1. Include the controller file - // require_once APP_ROOT.'/controllers/' . $this->_controller . '.php';
		// 2. Autoload the controller class - take advantage of the PSR-4 autoloader by simply calling the class method.
		$controller = self::CONTROLLER_NAMESPACE.'\\'.$this->params['controller'];	
		$this->controller_object = new $controller($this->params); // new HomeController
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