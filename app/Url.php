<?php

namespace App;

use App\Helpers\Utilities;

class Url
{
	public static function get(): ?array	{   
        if(!isset($_GET['url'])) {
            return null;
        }
        
		$url = Utilities::parseURL(explode('/', $_GET['url']));
		return $url;
	}

	public static function getPath(): ?array {   
        if(!isset($_GET['url'])) {
            return null;
        }
        
		$url = Utilities::parseURL(explode('/', $_GET['url']));
		return $url;
	}

	public static function getParams(): ?array {   
        if(!isset($_GET)) {
            return null;
        }

		$params = [];
		foreach($_GET as $key => $value){
			if($key == 'url'){
				continue; // no need to parse the url
			}

			$cleanParams[$key] = Utilities::sanitizeInput($value);
		}

		return $params;
	}
}